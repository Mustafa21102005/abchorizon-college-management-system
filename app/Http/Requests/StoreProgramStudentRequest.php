<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramStudentRequest extends FormRequest
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
            'student_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($this->program_id) {
                        $exists = \App\Models\ProgramStudent::where('student_id', $value)
                            ->where('program_id', $this->program_id)
                            ->exists();
                        if ($exists) {
                            $fail('This student is already enrolled in the selected program.');
                        }
                    }
                },
            ],
            'program_id' => 'required|exists:programs,id',
        ];
    }
}
