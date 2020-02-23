<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class RecoverPasswordRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        return [
            'email' => 'required|max:190|min:5|email|exists:users,email',
        ];
    }
}
