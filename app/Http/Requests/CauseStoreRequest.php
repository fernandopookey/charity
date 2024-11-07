<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CauseStoreRequest extends FormRequest
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
            'title'         => 'required|string',
            'goal'          => 'required|numeric',
            'description'   => 'nullable',
            'status'        => 'required',
            'days'          => 'required'
        ];
    }

    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'goal' => str_replace('.', ['Rp'], '', $this->goal)
    //     ]);
    //     // $string = 'goal';
    //     // $replaced = Str::replace('.', 'Rp', '', $string);
    // }

    protected function prepareForValidation()
    {
        $goal = $this->input('goal');
        $modifiedGoal = str_replace(['.', 'Rp'], '', $goal);

        if (!empty($modifiedGoal)) {
            $this->merge(['goal' => $modifiedGoal]);
        }
    }
}
