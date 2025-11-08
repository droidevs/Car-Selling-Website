<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "id",
        "maker_id",
        "model_id",
        "year",
        "price",
        "vin",
        "mileage",
        "car_type_id",
        "fuel_type_id",
        #"user_id",
        "city_id",
        "address",
        "phone",
        "description",
        "published_at",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function features(): HasOne
    {
        return $this->hasOne(CarFeatures::class, 'car_id');
    }


    public function primaryImage()
    {
        return $this->hasOne(CarImage::class)->oldestOfMany('position');
    }

}
