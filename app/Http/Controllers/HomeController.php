<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        //$cars = Car::get();
        $cars = Car::where('published_at','!=', null)->first();
        dump($cars);
        return view('home.index');
    }
}
