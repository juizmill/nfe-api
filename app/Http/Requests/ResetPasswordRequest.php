<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class ResetPasswordRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        return [
            'password_confirmation' => 'required|max:190|min:5',
            'password' => 'required|max:190|min:5|confirmed:password_confirmation',
            'token' => 'required|exists:users,token'
        ];
    }
}
