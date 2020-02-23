<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use App\Service\MaterialTable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = (new MaterialTable($request, Permission::query()))
            ->setColumns(['name'])
            ->pagination();

        return response()->json($permissions, Response::HTTP_OK);
    }

    public function store(PermissionRequest $request)
    {
        try {
            $data = $request->only(['name', 'description']);
            $permission = Permission::query()->create($data);

            return response()->json($permission, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $permission = Permission::query()->with(['roles'])->findOrFail($id);
            return response()->json($permission, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(PermissionRequest $request, $id)
    {
        try {
            $permission = Permission::query()->with(['roles'])->findOrFail($id);
            $data = $request->only(['name', 'description']);

            $permission->update($data);

            return response()->json($permission, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $permission = Permission::query()->findOrFail($id);
            $permission->delete();

            return response()->json($permission, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }
}
