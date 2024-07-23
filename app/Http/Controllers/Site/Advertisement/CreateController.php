<?php

namespace App\Http\Controllers\Site\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Ban;
use App\Models\FuelType;
use App\Models\Gear;
use App\Models\Color;
use App\Models\City;
use App\Models\Currency;
use App\Models\CarSupply;



use Illuminate\Support\Facades\Cache;

class CreateController extends Controller
{
    public function create()
    {
        $cars = Cache::remember('car_select', 3600 * 24, function (){
            return Car::query()
                ->select('id', 'name')
                ->whereNull('deleted_at')
                ->get();
        });

        $fuels = Cache::remember('fuel_select', 3600 * 24, function (){
            return FuelType::query()
                ->select('id', 'name')
                ->get();
        });

        $gears = Cache::remember('gear_select', 3600 * 24, function (){
            return Gear::query()
                ->select('id', 'name')
                ->get();
        });
     
        $bans = Cache::remember('ban_select', 3600 * 24, function (){
            return Ban::query()
                ->select('id', 'name')
                ->get();
        });

        $currencies = Cache::remember('currency_select', 3600 * 24, function (){
            return Currency::query()
                ->select('id', 'name')
                ->get();
        });

        $supplies = 
             CarSupply::query()
                ->select('id', 'name')
                ->get();
     
        $colors = Color::query()
            ->get();

        $cities = City::query()
            ->get();
            
        return view('site.create', compact('cars','fuels', 'gears', 'bans', 'colors', 'cities', 'currencies', 'supplies'));       
    }


    
}