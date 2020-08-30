<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'nullable'],
            'email' => ['string', 'email', 'nullable', 'max:255', Rule::unique('users', 'email')->ignore(Auth::id())],
            'password' => ['string', 'min:8', 'nullable', 'confirmed'],
            'lastname' => ['string', 'nullable', 'max:255'],
            'age' => ['integer', 'nullable'],
            'gender' => [Rule::in(['male', 'female'], 'nullable')]
        ];
    }
}
