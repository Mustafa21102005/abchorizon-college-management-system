<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGradeRequest extends FormRequest
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
    public function rules()
    {
        return [
            'student_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:sub_programs,id',
            'grade' => [
                'required',
                'in:Pass,Merit,Distinction,Referral,Fail',
                Rule::unique('grades')->where(function ($query) {
                    // Ensure the grade is unique for this student and subject combination
                    return $query->where('student_id', $this->input('student_id'))
                        ->where('subject_id', $this->input('subject_id'));
                })->ignore($this->route('grade')), // Ignore the current grade being updated
            ],
        ];
    }
}
