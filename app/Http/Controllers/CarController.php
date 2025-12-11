<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = User::find(1)
            ->cars()
            ->with(['primaryImage','maker','model'])
            ->orderBy('created_at', 'desc')
            ->paginate(5)
//          ->withPath('/users/cars');
//          ->appends(['sort' => 'price'])
            ->withQueryString();

        return view('car.index',['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $models = \App\Models\Model::all();
        $years = range(date('Y'), 1950);
        $types = CarType::all();
        $states = State::all();
        $cities = City::all();

        return view(
            'car.create',
            ['makers' => $makers, 'models' => $models,
             'years' => $years, 'types' => $types,
             'states' => $states, 'cities' => $cities]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        // ----------------------------------------
        // 1. CREATE THE CAR
        // ----------------------------------------
        $car = Car::create([
            'maker_id'     => $request->maker_id,
            'model_id'     => $request->model_id,
            'year'         => $request->year,
            'price'        => $request->price,
            'vin'          => $request->vin,
            'mileage'      => $request->mileage,
            'car_type_id'  => $request->car_type_id,
            'fuel_type_id' => $request->fuel_type_id,
            'city_id'      => $request->city_id,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'description'  => $request->description,

            'published_at' => now(),
        ]);

        // ----------------------------------------
        // 2. CREATE FEATURES
        // ----------------------------------------
        $car->features()->create([
            'abs'                      => $request->boolean('abs'),
            'air_conditioning'         => $request->boolean('air_conditioning'),
            'power_windows'            => $request->boolean('power_windows'),
            'power_door_locks'         => $request->boolean('power_door_locks'),
            'cruise_control'           => $request->boolean('cruise_control'),
            'bluetooth_connectivity'   => $request->boolean('bluetooth_connectivity'),

            'remote_start'             => $request->boolean('remote_start'),
            'gps_navigation'           => $request->boolean('gps_navigation'),
            'heated_seats'             => $request->boolean('heated_seats'),
            'climate_control'          => $request->boolean('climate_control'),
            'rear_parking_sensors'     => $request->boolean('rear_parking_sensors'),
            'leather_seats'            => $request->boolean('leather_seats'),
        ]);

        // ----------------------------------------
        // 3. SAVE IMAGES
        // ----------------------------------------
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                $path = $image->store("car_images/{$car->id}", 'public');

                $car->images()->create([
                    'image_path' => $path,
                    'position'   => $i, // gallery ordering
                ]);
            }
        }

        return redirect()->route('car.index')
            ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Car $car)
    {
        return view('car.show',['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', ['car' => $car,
            'makers' => Maker::all(),
            'models' => \App\Models\Model::all(),
            'years' => range(date('Y'), 1950),
            'car_types' => CarType::all(),
            'fuel_types' => FuelType::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        dd($request->all());
        DB::transaction(function () use ($request, $car) {
            // Update main Car attributes
            $car->update([
                'maker_id'     => $request->maker,
                'model_id'     => $request->model,
                'year'         => $request->year,
                'car_type_id'  => $request->car_type,
                'price'        => $request->price,
                'vin'          => $request->vin,
                'mileage'      => $request->mileage,
                'fuel_type_id' => $request->fuel_type,
                'city_id'      => $request->city,
                'address'      => $request->address,
                'phone'        => $request->phone,
                'description'  => $request->description,
            ]);

            // Update or create features
            $featuresData = $request->only([
                'air_conditioning',
                'power_windows',
                'power_door_locks',
                'abs',
                'cruise_control',
                'bluetooth_connectivity',
                'remote_start',
                'gps_navigation',
                'heated_seats',
                'climate_control',
                'rear_parking_sensors',
                'leather_seats',
            ]);

            $car->features()->updateOrCreate(
                ['car_id' => $car->id],
                $featuresData
            );
        });

        return redirect()->route('car.show', $car)->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index');
    }

    public function search()
    {
        $query = Car::where('published_at','<',now())
            ->with(['primaryImage','city','carType','fuelType','maker','model'])
            ->orderBy('published_at','desc');

        $cars = $query->paginate(5);

        return view('car.search',['cars' => $cars]);
    }

    public function watchlist() {
        $cars = User::find(1)
            ->favouriteCars()
            ->with(['primaryImage','city','carType','fuelType','maker','model'])
            ->paginate(5);

        return view('car.watchlist',['cars' => $cars]);
    }
}
