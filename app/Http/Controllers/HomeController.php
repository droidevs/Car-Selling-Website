<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {

        $cars = Car::where('published_at','<',now())
            ->with(['primaryImage','city','carType','fuelType','maker','model'])
            ->orderBy('published_at','desc')
            ->limit(30)
            ->get();

        return view('home.index',['cars' => $cars]);

    }
}
