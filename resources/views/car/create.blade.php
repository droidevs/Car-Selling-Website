@props(['models' => [], 'makers' => [], 'years' => [], 'types' => [], 'states' => [], 'cities' => []])
<x-app-layout>
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title">Add new car</h1>
            <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data"
                class="card add-new-car-form">
                @csrf
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select name="maker">
                                        <option value="-1">Select Maker</option>
                                        @foreach ($makers as $maker)
                                            <option value="{{ $maker->id }}">{{ $maker->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="error-message">This field is required</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Model</label>
                                    <select name="model">
                                        <option value="-1">Select Model</option>
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year">
                                        <option value="">Select Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Car Type</label>
                            <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($types as $type)
                                    <label class="inline-flex items-center p-2 border rounded">
                                        <input type="radio" name="car_type" value="{{ $type->id }}"
                                            class="mr-2">
                                        {{ $type->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" placeholder="Price" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Vin Code</label>
                                    <input name="vin" placeholder="Vin Code" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mileage (ml)</label>
                                    <input name="mileage" placeholder="Mileage" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($types as $type)
                                    <label class="inline-flex items-center p-2 border rounded">
                                        <input type="radio" name="car_type" value="{{ $type->id }}"
                                            class="mr-2">
                                        {{ $type->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>State/Region</label>
                                    <select name="state">
                                        <option value="-1">State/Region</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city">
                                        <option value="-1">Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        const stateSelect = document.querySelector('select[name="state"]');
                                        const citySelect = document.querySelector('select[name="city"]');

                                        stateSelect.addEventListener('change', async () => {
                                            const stateId = stateSelect.value;

                                            // Disable city select and clear options initially
                                            citySelect.innerHTML = '<option value="">Select a city</option>';
                                            citySelect.disabled = true;

                                            if (!stateId) {
                                                return; // No state selected, do nothing
                                            }

                                            try {
                                                const response = await fetch(`/cities?state_id=${stateId}`, {
                                                    method: 'GET', // explicitly specify method
                                                    headers: {
                                                        'Accept': 'application/json',
                                                    },
                                                });
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }

                                                const cities = await response.json();

                                                // Populate city select
                                                cities.forEach(city => {
                                                    const option = document.createElement('option');
                                                    option.value = city.id;
                                                    option.textContent = city.name;
                                                    citySelect.appendChild(option);
                                                });

                                                citySelect.disabled = false;
                                            } catch (error) {
                                                console.error('Error fetching cities:', error);
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" placeholder="Address" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" placeholder="Phone" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="air_conditioning" value="1" />
                                        Air Conditioning
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="power_windows" value="1" />
                                        Power Windows
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="power_door_locks" value="1" />
                                        Power Door Locks
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="abs" value="1" />
                                        ABS
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="cruise_control" value="1" />
                                        Cruise Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="bluetooth_connectivity" value="1" />
                                        Bluetooth Connectivity
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remote_start" value="1" />
                                        Remote Start
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="gps_navigation" value="1" />
                                        GPS Navigation System
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="heated_seats" value="1" />
                                        Heated Seats
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="climate_control" value="1" />
                                        Climate Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="rear_parking_sensors" value="1" />
                                        Rear Parking Sensors
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="leather_seats" value="1" />
                                        Leather Seats
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea name="description" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="published" />
                                Published
                            </label>
                        </div>
                    </div>
                    <div class="form-images">
                        <div class="form-image-upload">
                            <div class="upload-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 48px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <input id="carFormImageUpload" type="file" name="images[]" multiple />
                        </div>
                        <div id="imagePreviews" class="car-form-images"></div>
                    </div>
                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">
                        <button type="button" class="btn btn-default">Reset</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
