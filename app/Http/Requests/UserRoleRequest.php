<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class UserRoleRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        return [
            'user' => 'required|numeric|exists:users,id',
            'roles' => 'array|exists:roles,id|nullable',
        ];
    }
}
