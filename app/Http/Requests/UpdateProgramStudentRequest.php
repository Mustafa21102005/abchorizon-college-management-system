<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramStudentRequest extends FormRequest
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
        $programStudentId = $this->route('programStudent');

        return [
            'student_id' => [
                'required', // Always required since the value will be passed programmatically
                'exists:users,id',
                Rule::unique('program_students')->where(function ($query) use ($programStudentId) {
                    return $query->where('program_id', $this->program_id)
                        ->where('id', '!=', $programStudentId);
                }),
            ],
            'program_id' => 'required|exists:programs,id',
        ];
    }
}
