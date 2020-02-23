<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class PermissionRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        return [
            'name' => 'required|max:100|min:2|unique:roles,name'
        ];
    }
}
