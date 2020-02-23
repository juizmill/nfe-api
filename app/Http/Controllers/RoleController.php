<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Role;
use App\Service\MaterialTable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = (new MaterialTable($request, Role::query()))
            ->setColumns(['name'])
            ->pagination();

        return response()->json($roles, Response::HTTP_OK);
    }

    public function store(RoleRequest $request)
    {
        try {
            $data = $request->only(['name', 'description']);
            $role = Role::query()->create($data);

            return response()->json($role, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $role = Role::query()->with(['permissions'])->findOrFail($id);
            return response()->json($role, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(RoleRequest $request, $id)
    {
        try {
            $role = Role::query()->with(['permissions'])->findOrFail($id);
            $data = $request->only(['name', 'description']);

            $role->update($data);

            return response()->json($role, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::query()->findOrFail($id);
            $role->delete();

            return response()->json($role, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }
}
