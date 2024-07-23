<?php

namespace App\Http\Controllers\Dashboard\CarModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Car;


class QueryController extends Controller
{
    public function create()
    {
        $cars = $this->getCarForSelect();
        
        return view('dashboard.car-model.create', compact('cars'));
    }

    public function index(Request $request)
    {
        $models = CarModel::query()
                ->from('car_models as cm')
                ->select(
                    'cm.id',
                    'cm.name',
                    'c.name as car',
                    'cm.created_at',
                    'u.name as creator',
                )
                ->join('cars as c', 'c.id', 'cm.car_id')
                ->join('users as u', 'cm.created_by', 'u.id')
                ->paginate(10);
                
        return view('dashboard.car-model.index', compact('models'));            
    }

    public function edit($id)
    {
        $model = CarModel::query()
                ->where('id', $id)
                ->fisrt();
        
        if (!$model) 
            abort(404);

        $cars = $this->getCarForSelect();

        $cars = Car::query()
            ->select(
                'id',
                'name'
            )
            ->get();

        return view('dashboard.car-model.edit', compact('model', 'cars'));   
        
    }

    private function getCarForSelect()
    {
        return Car::query()
        ->select('id',
                'name',
        )
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
             
    }
}