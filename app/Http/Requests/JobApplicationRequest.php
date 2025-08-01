<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255|min:2',
            'lastName' => 'required|string|max:255|min:2',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20|regex:/^[\d\-\+\(\)\s\.]+$/',
            'address' => 'nullable|string|max:500',
            'experience' => 'required|string|in:1-2,3-5,5-10,10+',
            'currentSalary' => 'nullable|string|max:100',
            'expectedSalary' => 'required|string|max:100',
            'availability' => 'required|date|after:today',
            'skills' => 'required|string|max:2000',
            'education' => 'nullable|string|max:500',
            'portfolio' => 'nullable|url|max:255',
            'whyJoin' => 'nullable|string|max:2000',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'coverLetter' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'terms' => 'required|accepted',
            'newsletter' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'firstName.required' => 'Please enter your first name.',
            'firstName.min' => 'First name must be at least 2 characters long.',
            'lastName.required' => 'Please enter your last name.',
            'lastName.min' => 'Last name must be at least 2 characters long.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'experience.required' => 'Please select your experience level.',
            'expectedSalary.required' => 'Please enter your expected salary.',
            'availability.required' => 'Please select your available start date.',
            'availability.after' => 'Available start date must be in the future.',
            'skills.required' => 'Please list your technical skills.',
            'resume.required' => 'Please upload your resume.',
            'resume.mimes' => 'Resume must be in PDF, DOC, or DOCX format.',
            'resume.max' => 'Resume file size must be less than 5MB.',
            'coverLetter.mimes' => 'Cover letter must be in PDF, DOC, or DOCX format.',
            'coverLetter.max' => 'Cover letter file size must be less than 5MB.',
            'portfolio.url' => 'Please enter a valid portfolio URL.',
            'terms.required' => 'You must agree to the terms and conditions.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'firstName' => 'first name',
            'lastName' => 'last name',
            'currentSalary' => 'current salary',
            'expectedSalary' => 'expected salary',
            'coverLetter' => 'cover letter',
            'whyJoin' => 'motivation statement',
        ];
    }
}
