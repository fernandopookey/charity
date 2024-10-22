<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauseUpdateRequest extends FormRequest
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
            'title'         => 'nullable|string',
            'goal'          => 'nullable|numeric',
            'description'   => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $goal = $this->input('goal');
        $modifiedGoal = str_replace(['.', 'Rp'], '', $goal);

        if (!empty($modifiedGoal)) {
            $this->merge(['goal' => $modifiedGoal]);
        }
    }
}