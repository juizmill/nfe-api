<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Service\MaterialTable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\VehicleRequest;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = (new MaterialTable($request, $this->transportBuilder()))
            ->setColumns(['placa', 'UF', 'RNTC', 'reboque', 'created_at'])
            ->pagination();

        return response()->json($vehicles);
    }

    public function store(VehicleRequest $request)
    {
        try {
            $data = $request->only([
                'placa',
                'UF',
                'RNTC',
                'reboque',
                'transport_id'
            ]);

            $data['user_id'] = auth('api')->user()->id;
            $vehicle = Vehicle::query()->create($data);

            return response()->json($vehicle, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $vehicle = $this->transportBuilder()->findOrFail($id);
            return response()->json($vehicle, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(VehicleRequest $request, $id)
    {
        try {
            $vehicle = $this->transportBuilder()->findOrFail($id);
            $data = $request->only([
                'placa',
                'UF',
                'RNTC',
                'reboque',
                'transport_id'
            ]);

            $data['user_id'] = auth('api')->user()->id;
            $vehicle->update($data);

            return response()->json($vehicle, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $vehicle = $this->transportBuilder()->findOrFail($id);
            $vehicle->delete();

            return response()->json($vehicle, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }

    protected function transportBuilder(): Builder
    {
        $user = auth('api')->user();
        return Vehicle::query()
            ->where('user_id', '=', $user->id);
    }
}
