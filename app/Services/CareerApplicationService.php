<?php

namespace App\Services;

use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CareerApplicationService
{
    /**
     * Process and store a job application
     */
    public function processApplication(Request $request, JobPosting $job)
    {
        // Handle resume upload
        $resumeData = $this->handleResumeUpload($request);

        // Create application
        $application = $job->applications()->create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cover_letter' => $request->cover_letter,
            'resume_path' => $resumeData['path'],
            'original_filename' => $resumeData['original_name'],
            'portfolio_url' => $request->portfolio_url,
            'linkedin_url' => $request->linkedin_url,
            'github_url' => $request->github_url,
            'status' => JobApplication::STATUS_PENDING,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Increment job applications count
        $job->increment('applications_count');

        // Log application
        $this->logApplication($application);

        return $application;
    }

    /**
     * Handle resume file upload
     */
    private function handleResumeUpload(Request $request)
    {
        if (!$request->hasFile('resume')) {
            throw new \Exception('Resume file is required');
        }

        $file = $request->file('resume');
        $originalName = $file->getClientOriginalName();
        $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('resumes', $fileName, 'public');

        return [
            'path' => $path,
            'original_name' => $originalName,
        ];
    }

    /**
     * Log application activity
     */
    private function logApplication(JobApplication $application)
    {
        Log::info('Job application submitted', [
            'application_id' => $application->id,
            'job_title' => $application->jobPosting->title,
            'applicant_email' => $application->email,
            'application_score' => $application->getApplicationScore(),
            'application_quality' => $application->getApplicationQuality(),
        ]);
    }

    /**
     * Get application statistics
     */
    public function getApplicationStats()
    {
        return [
            'total_applications' => JobApplication::count(),
            'pending_applications' => JobApplication::pending()->count(),
            'reviewed_applications' => JobApplication::reviewed()->count(),
            'shortlisted_applications' => JobApplication::shortlisted()->count(),
            'recent_applications' => JobApplication::recent(7)->count(),
            'monthly_applications' => JobApplication::recent(30)->count(),
        ];
    }

    /**
     * Get job-specific application statistics
     */
    public function getJobApplicationStats(JobPosting $job)
    {
        return [
            'total_applications' => $job->applications()->count(),
            'pending_applications' => $job->applications()->pending()->count(),
            'reviewed_applications' => $job->applications()->reviewed()->count(),
            'shortlisted_applications' => $job->applications()->shortlisted()->count(),
            'recent_applications' => $job->applications()->recent(7)->count(),
            'average_score' => $job->applications()->get()->avg('application_score'),
            'competition_level' => $this->getCompetitionLevel($job->applications()->count()),
        ];
    }

    /**
     * Determine competition level
     */
    private function getCompetitionLevel($applicationCount)
    {
        if ($applicationCount < 10) return 'low';
        if ($applicationCount < 50) return 'medium';
        if ($applicationCount < 100) return 'high';
        return 'very_high';
    }

    /**
     * Check for duplicate applications
     */
    public function checkDuplicateApplication($email, $jobId)
    {
        return JobApplication::where('email', $email)
            ->where('job_posting_id', $jobId)
            ->exists();
    }

    /**
     * Get application by email and job
     */
    public function getApplicationByEmail($email, $jobId)
    {
        return JobApplication::where('email', $email)
            ->where('job_posting_id', $jobId)
            ->first();
    }

    /**
     * Update application status
     */
    public function updateApplicationStatus(JobApplication $application, $status, $reviewerId = null, $notes = null)
    {
        $updateData = [
            'status' => $status,
            'reviewed_at' => now(),
            'reviewed_by' => $reviewerId,
        ];

        if ($notes) {
            $updateData['admin_notes'] = $notes;
        }

        $application->update($updateData);

        Log::info('Application status updated', [
            'application_id' => $application->id,
            'new_status' => $status,
            'reviewer_id' => $reviewerId,
        ]);

        return $application;
    }

    /**
     * Download resume file
     */
    public function downloadResume(JobApplication $application)
    {
        if (!$application->resume_path) {
            throw new \Exception('Resume file not found');
        }

        $path = storage_path('app/public/' . $application->resume_path);

        if (!file_exists($path)) {
            throw new \Exception('Resume file not found on disk');
        }

        $filename = $application->original_filename ?: 'resume.' . pathinfo($application->resume_path, PATHINFO_EXTENSION);

        return response()->download($path, $filename);
    }

    /**
     * Delete application and associated files
     */
    public function deleteApplication(JobApplication $application)
    {
        // Delete resume file
        if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
            Storage::disk('public')->delete($application->resume_path);
        }

        // Decrement job applications count
        $application->jobPosting->decrement('applications_count');

        // Delete application
        $application->delete();

        Log::info('Application deleted', [
            'application_id' => $application->id,
            'job_title' => $application->jobPosting->title,
        ]);
    }

    /**
     * Get application analytics
     */
    public function getApplicationAnalytics()
    {
        $applications = JobApplication::with('jobPosting')->get();

        $analytics = [
            'total_applications' => $applications->count(),
            'applications_by_status' => $applications->groupBy('status')->map->count(),
            'applications_by_month' => $applications->groupBy(function($app) {
                return $app->created_at->format('Y-m');
            })->map->count(),
            'average_application_score' => $applications->avg('application_score'),
            'quality_distribution' => $applications->groupBy('application_quality')->map->count(),
            'top_applicant_sources' => $this->getTopApplicantSources($applications),
        ];

        return $analytics;
    }

    /**
     * Get top applicant sources
     */
    private function getTopApplicantSources($applications)
    {
        $sources = [];

        foreach ($applications as $application) {
            $source = 'Direct Application';

            if ($application->portfolio_url) $source = 'Portfolio';
            elseif ($application->linkedin_url) $source = 'LinkedIn';
            elseif ($application->github_url) $source = 'GitHub';

            $sources[$source] = ($sources[$source] ?? 0) + 1;
        }

        arsort($sources);
        return array_slice($sources, 0, 5, true);
    }
}
