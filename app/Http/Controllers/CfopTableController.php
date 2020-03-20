<?php

namespace App\Http\Controllers;

use App\CfopTable;
use Illuminate\Http\Request;
use App\Service\MaterialTable;

class CfopTableController extends Controller
{
    public function index(Request $request)
    {
        $customers = (new MaterialTable($request, CfopTable::query()))
            ->setColumns(['name', 'origin'])
            ->pagination();

        return response()->json($customers);
    }
}
