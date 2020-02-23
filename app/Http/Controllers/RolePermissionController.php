<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RolePermissionRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RolePermissionController extends Controller
{
    public function store(RolePermissionRequest $request)
    {
        try {
            $role = Role::query()->findOrFail($request->input('role'));
            $role->permissions()->detach();
            $role->permissions()->attach($request->input('permissions'));

            return response()->json('Permissão adicionado com sucesso', Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy(RolePermissionRequest $request)
    {
        try {
            $role = Role::query()->findOrFail($request->input('role'));
            $permissions = !empty($request->input('permissions')) ? $request->input('permissions') : null;
            $role->permissions()->detach($permissions);

            return response()->json('Permissões removidas com sucesso', Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
