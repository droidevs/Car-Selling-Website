<?php

namespace App\Http\Controllers;
use App\Http\Requests\GetCitiesRequest;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function __construct()
    {

    }

    public function index(GetCitiesRequest $request): JsonResponse
    {
        $stateId = $request->input('state_id');
        dd($stateId);

        $cities = City::where('state_id','=', $stateId)->get(['id', 'name']);

        return response()->json($cities);
    }
}
