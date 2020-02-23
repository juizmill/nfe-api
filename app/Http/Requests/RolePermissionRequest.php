<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class RolePermissionRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        return [
            'role' => 'required|numeric|exists:roles,id',
            'permissions' => 'array|exists:permissions,id|nullable',
        ];
    }
}
