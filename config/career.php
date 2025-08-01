<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Career Application Settings
    |--------------------------------------------------------------------------
    |
    | This file contains configuration settings for the career application
    | management system. These settings control various aspects of how
    | applications are processed and managed.
    |
    */

    // Automation Settings
    'auto_review_enabled' => env('CAREER_AUTO_REVIEW_ENABLED', false),
    'email_notifications' => env('CAREER_EMAIL_NOTIFICATIONS', true),
    'review_deadline_hours' => env('CAREER_REVIEW_DEADLINE_HOURS', 72),

    // Application Requirements
    'require_cover_letter' => env('CAREER_REQUIRE_COVER_LETTER', true),
    'require_portfolio' => env('CAREER_REQUIRE_PORTFOLIO', false),

    // Limits & Expiry
    'max_applications_per_job' => env('CAREER_MAX_APPLICATIONS_PER_JOB', 100),
    'application_expiry_days' => env('CAREER_APPLICATION_EXPIRY_DAYS', 30),

    // Default Settings
    'default_status' => env('CAREER_DEFAULT_STATUS', 'pending'),

    // Quality Scoring
    'quality_score_weights' => [
        'cover_letter' => 0.3,
        'skills_match' => 0.25,
        'experience_level' => 0.2,
        'portfolio_quality' => 0.15,
        'response_time' => 0.1,
    ],

    // Notification Settings
    'notifications' => [
        'new_application' => true,
        'application_reviewed' => true,
        'application_shortlisted' => true,
        'application_rejected' => true,
        'deadline_reminder' => true,
    ],

    // Review Process
    'review_process' => [
        'auto_shortlist_score' => 8.0,
        'auto_reject_score' => 4.0,
        'require_manual_review' => true,
        'allow_bulk_actions' => true,
    ],

    // Export Settings
    'export' => [
        'include_sensitive_data' => false,
        'max_records_per_export' => 1000,
        'allowed_formats' => ['csv', 'xlsx'],
    ],
];
