<?php

namespace Database\Factories;

use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->jobTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraphs(3, true),
            'requirements' => $this->faker->paragraphs(2, true),
            'responsibilities' => $this->faker->paragraphs(2, true),
            'benefits' => $this->faker->paragraphs(2, true),
            'location' => $this->faker->city() . ', ' . $this->faker->state(),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'internship']),
            'experience_level' => $this->faker->randomElement(['entry', 'mid', 'senior', 'executive']),
            'salary_min' => $this->faker->numberBetween(30000, 80000),
            'salary_max' => $this->faker->numberBetween(80000, 150000),
            'salary_currency' => 'USD',
            'salary_period' => 'yearly',
            'category_id' => JobCategory::factory(),
            'created_by' => User::factory(),
            'status' => 'published',
            'published_at' => now(),
            'expires_at' => now()->addMonths(3),
            'views' => $this->faker->numberBetween(0, 1000),
            'applications_count' => $this->faker->numberBetween(0, 50),
        ];
    }

    /**
     * Indicate that the job posting is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    /**
     * Indicate that the job posting is closed.
     */
    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'closed',
            'expires_at' => now()->subDays(1),
        ]);
    }
}
