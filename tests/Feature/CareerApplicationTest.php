<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\JobPosting;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CareerApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_job_listing()
    {
        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/careers');

        $response->assertStatus(200);
        $response->assertSee($job->title);
    }

    public function test_user_can_view_job_details()
    {
        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get("/careers/job/{$job->slug}");

        $response->assertStatus(200);
        $response->assertSee($job->title);
    }

    public function test_user_can_access_application_form()
    {
        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get("/careers/job/{$job->slug}/apply");

        $response->assertStatus(200);
        $response->assertSee('Apply for This Position');
    }

    public function test_user_can_submit_application()
    {
        Storage::fake('public');

        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $resume = UploadedFile::fake()->create('resume.pdf', 100);

        $response = $this->post("/careers/job/{$job->slug}/apply", [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'address' => '123 Main St, City, State 12345',
            'experience' => '3-5',
            'expectedSalary' => '$80,000',
            'availability' => '2024-02-01',
            'skills' => 'PHP, Laravel, JavaScript, Vue.js',
            'education' => 'Bachelor\'s in Computer Science',
            'portfolio' => 'https://portfolio.example.com',
            'whyJoin' => 'I am excited about this opportunity and believe I can contribute to the team.',
            'resume' => $resume,
            'terms' => '1',
        ]);

        $response->assertRedirect("/careers/job/{$job->slug}");
        $response->assertSessionHas('success');

        // Verify application was created
        $this->assertDatabaseHas('job_applications', [
            'job_posting_id' => $job->id,
            'full_name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'address' => '123 Main St, City, State 12345',
            'skills' => 'PHP, Laravel, JavaScript, Vue.js',
            'motivation' => 'I am excited about this opportunity and believe I can contribute to the team.',
            'expected_salary' => '$80,000',
            'availability' => '2024-02-01',
            'portfolio_url' => 'https://portfolio.example.com',
            'status' => 'pending',
        ]);
    }

    public function test_application_validation_works()
    {
        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->post("/careers/job/{$job->slug}/apply", [
            // Missing required fields
        ]);

        $response->assertSessionHasErrors([
            'firstName',
            'lastName',
            'email',
            'phone',
            'experience',
            'expectedSalary',
            'availability',
            'skills',
            'resume',
            'terms',
        ]);
    }

    public function test_duplicate_application_is_prevented()
    {
        Storage::fake('public');

        // Create a job category
        $category = JobCategory::factory()->create();

        // Create a job posting
        $job = JobPosting::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $resume = UploadedFile::fake()->create('resume.pdf', 100);

        $applicationData = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'experience' => '3-5',
            'expectedSalary' => '$80,000',
            'availability' => '2024-02-01',
            'skills' => 'PHP, Laravel, JavaScript, Vue.js',
            'resume' => $resume,
            'terms' => '1',
        ];

        // Submit first application
        $this->post("/careers/job/{$job->slug}/apply", $applicationData);

        // Try to submit duplicate application
        $response = $this->post("/careers/job/{$job->slug}/apply", $applicationData);

        $response->assertRedirect("/careers/job/{$job->slug}");
        $response->assertSessionHas('error');
    }
}
