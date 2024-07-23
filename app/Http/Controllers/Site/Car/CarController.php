<?php

namespace App\Http\Controllers\Site\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;


class CarController extends Controller
{
    public function getCarModelByCarId($car_id)
    {
        $models = CarModel::query()
                ->select(
                    'id',
                    'name'
                )
                ->where('car_id', $car_id)
                ->get();

        return $models;      
    }
}