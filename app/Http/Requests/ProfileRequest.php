<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'    => ['required', 'max:65'],
            'last_name'     => ['required', 'max:65'],
            'dbo'           => ['required', 'before_or_equal:'.Date('Y-m-d')],
            'gender'        => ['required', 'integer', 'between:0,2']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json(['data' => null, 'error' => $errors], 422)
            );
        }

        parent::failedValidation($validator);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required'   => 'The first name field is required.',
            'first_name.max'        => 'The first name field cannot be greater than 65 characters.',
            'last_name.required'    => 'The last name field is required.',
            'last_name.max'         => 'The last name field cannot be greater than 65 characters.',
            'dbo.required'          => 'The date of birth field is required.',
            'dbo.before_or_equal'   => 'The date of birth cannot be greater than the current date.',
            'gender.required'       => 'The gender field is required.',
            'gender.between'        => 'Valid values for gender: 0 (Male), 1 (Female), 2 (Other).',
            'gender.integer'        => 'The gender field accepts only integer numbers.',
        ];
    }
}
