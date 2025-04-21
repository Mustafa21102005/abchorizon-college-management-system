<?php

namespace App\Http\Requests;

use App\Models\Grade;
use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'student_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:sub_programs,id',
            'grade' => 'required|in:Pass,Merit,Distinction,Referral,Fail',
        ];
    }

    /**
     * Perform the logic to check if the grade already exists.
     *
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $existingGrade = Grade::where('student_id', $this->student_id)
                ->where('subject_id', $this->subject_id)
                ->exists();

            if ($existingGrade) {
                $validator->errors()->add('grade', 'This student has already been graded for this subject.');
            }
        });
    }
}
