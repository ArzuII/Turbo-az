<?php

namespace App\Http\Controllers\DashBoard\CarModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;


class CommandController extends Controller
{
    public function store(Request $request)
    {
        $check = CarModel::query()
                ->where('name', $request->name)
                ->where('car_id', $request->car_id)
                ->exists();

        if($check)
            return to_route('dashboard.car-model.create')->with('fail', self::MESSAGE_DUPLICATE);

        $check = CarModel::query()
                ->create([
                    'name' => $request->model,
                    'car_id' => $request->car_id,
                    'created_by' => auth()->user()->id

                ]);

        return to_route('dashboard.car-model.create')->with('success', self::MESSAGE_CREATED);
    }

    public function update(Request $request, $id)
    {
        $check = CarModel::query()
            ->where('name', $request->name)
            ->where('car_id', $request->car_id)
            ->where('id', '!=', $id)
            ->first();

        if ($check)
            return to_route('dashboard.car-model.edit', $id)->with('fail', self::MESSAGE_DUPLICATE);

        CarModel::query()
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'car_id' => $request->car_id,
            ]);

        return to_route('dashboard.car-model.edit', $id)->with('success', self::MESSAGE_UPDATED);
    }


}
