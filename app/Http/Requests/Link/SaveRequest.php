<?php

namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
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
            'original_url' => ['required', 'url'],
            'max_count' => ['required', 'numeric', 'min:0'],
            'expiration_hours' => ['required_if:expiration_minutes,null', 'numeric', 'nullable', 'min:1', 'max:24'],
            'expiration_minutes' => [
                'required_if:expiration_hours,null',
                'numeric',
                'nullable',
                'min:1',
                'max:59',
                function ($attribute, $value, $fail) {
                    if ($this->input('expiration_hours') == 24 && ($value != 0)) {
                        $fail(__('messages.expiration'));
                    }
                },
            ],
        ];
    }
}
