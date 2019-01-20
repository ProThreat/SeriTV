<?php

namespace App\Http\Requests;

// Laravel Auth
use Auth;
use Validator;

// Illuminate request models
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users,name|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed|max:255'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.min' => 'Name has to be at least longer than 3 characters',
            'name.max' => 'Name can\'t be longer than 255 characters',
            'name.unique' => 'Name is already taken',
            'name.required' => 'Name is required',
            'name.unique' => 'Email is already in use',
            'email.validation' => 'Enter a valid email address',
            'email.required' => 'Email is required',
            'password.min' => 'Password has to be at least longer than 3 characters',
            'password.max' => 'Password can\'t be longer than 255 characters',
            'password.required' => 'Password is required',
            'password.confirmed' => 'The passwords don\'t match'
        ];
    }
}