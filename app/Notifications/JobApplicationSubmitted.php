<?php

namespace App\Notifications;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Models\SmtpSetting;

class JobApplicationSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        // Set SMTP config dynamically
        $smtp = SmtpSetting::where('active', true)->first();
        if ($smtp) {
            config([
                'mail.mailers.smtp.host' => $smtp->host,
                'mail.mailers.smtp.port' => $smtp->port,
                'mail.mailers.smtp.username' => $smtp->username,
                'mail.mailers.smtp.password' => $smtp->password,
                'mail.mailers.smtp.encryption' => $smtp->encryption,
                'mail.from.address' => $smtp->from_address,
                'mail.from.name' => $smtp->from_name,
            ]);
        }

        $job = $this->application->jobPosting;
        $to = $this->application->email;
        $subject = 'Application Received - ' . $job->title;
        $data = [
            'applicant_name' => $this->application->full_name,
            'job_title' => $job->title,
            'company' => config('app.name'),
            'applied_at' => $this->application->created_at->format('M d, Y \a\t g:i A'),
            'job_url' => route('career.show', $job->slug),
            'logo' => $smtp ? $smtp->logo ?? null : null,
        ];
        // Send the custom Blade email
        Mail::send('emails.job_application', $data, function ($message) use ($to, $subject, $smtp) {
            $message->to($to)->subject($subject);
            if ($smtp && isset($smtp->from_address, $smtp->from_name)) {
                $message->from($smtp->from_address, $smtp->from_name);
            }
        });
        // Return a generic MailMessage for compatibility (not used)
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject($subject)
            ->line('Thank you for your application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'application_id' => $this->application->id,
            'job_title' => $this->application->jobPosting->title,
            'applicant_name' => $this->application->full_name,
            'applicant_email' => $this->application->email,
            'applied_at' => $this->application->created_at,
        ];
    }
}
