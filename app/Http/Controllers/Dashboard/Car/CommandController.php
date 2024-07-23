<?php

namespace App\Http\Controllers\Dashboard\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Cache;

class CommandController extends Controller
{
    public function store(Request $request)
    {
        $check = Car::query()
            ->where('name', trim($request->name))
            ->whereNull('created_at')
            ->exists();

        if ($check) 
        {
            return to_route('dashboard.car.create')->with('fail', self::MESSAGE_DUPLICATE);
        }
        Car::query()
            ->create([
            'name' => $request->name,
            'created_by' => auth()->user()->id
        ]);

        Cache::forget('car_select');
        
        return to_route('dashboard.car.create')->with('success', self::MESSAGE_CREATED);
    }

    public function update(Request $request, $id)
    {
        $check = Car::query()
            ->where('name', $reqquest->name)
            ->where('id', '!=', $id)
            ->exists();
        if ($check)
            return to_route('dashboard.car.edit', $id)->with('success', self::MESSAGE_DUPLICATE);
            
        $car = Car::query()
            ->where('id', $id)
            ->update([
                'name' => $request->name,
            ]);
            
        Cache::forget('car_select');        

        return to_route('dashboard.car.index')->with('success', self::MESSAGE_UPDATED);
    }

    public function delete($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at'=> now()
            ]);

        Cache::forget('car_select');

        return to_route('dashboard.car.index');
        
    }

    public function restore($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at'=> null
            ]);

        return to_route('dashboard.car.index')->with('success', self::MESSAGE_RESTORED);
        
    }
    

    public function refresh(Request $request)
    {
        $request->name =' ';
        $request->creator = ' ';   
        
        return to_route('dashboard.car.index');
    }


}