<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Car;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $afterMonth = date('Y-m-d', time() + 3600 * 24 * 30);

        $advertisements = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                DB::raw("CONCAT(a.price, ' ', cr.name) as price"),
                DB::raw("CONCAT(c.name, ' ', cm.name) as car"), 
                'ai.year',
                'ai.distance',
                'a.updated_at',
                'ct.name as city'
            )
            ->join('currencies as cr', 'cr.id', '=', 'a.currency_id')
            ->join('cars as c', 'c.id', '=', 'a.car_id')
            ->join('car_models as cm', 'cm.id', '=', 'a.model_id')
            ->join('advertisement_infos as ai', 'ai.advertisement_id', '=', 'a.id')
            ->join('cities as ct', 'ct.id', '=', 'ai.city_id')
            ->where('a.status', 2)
            ->whereDate('a.updated_at', '<', $afterMonth)
            ->with('photo')
            ->orderByDesc('a.updated_at');
           
            
            if($request->car != null){
                $advertisements = $advertisements->where('c.id', request()->car);
            }
            
            $advertisements = $advertisements->paginate(20);
            $cars = Car::query()->get();   
            
        return view('site.home', compact('advertisements', 'cars'));
    }

    public function show($id)
    {
        $advertisement = Advertisement::query()
        ->from("advertisements as a")
        ->select(
           'a.id',
           'a.body',
           'su.name as creator',
           'su.phone as creator_phone',
           'c.name as car',
           'cm.name as model',
           'a.price',
           'cr.name as currency',
           'a.status',
           'a.created_at',
           'ft.name as fuel_type',
           'g.name as gear',
           'b.name as ban',
           'ai.year',
           'cl.name as color',
           'ai.distance',
           'ai.vin_code',
           'a.view',
           'a.updated_at',
        )
     
        ->join("site_users as su", 'su.id', 'a.created_by')
        ->join("cars as c", 'c.id', 'a.car_id')
        ->join("car_models as cm", 'cm.id', 'a.model_id')
        ->join("currencies as cr", 'cr.id', 'a.currency_id')
        ->join("advertisement_infos as ai", 'ai.advertisement_id', 'a.id')
        ->join("fuel_types as ft", 'ft.id', 'ai.fuel_type_id')
        ->join("gears as g", 'g.id', 'ai.gear_id')
        ->join("bans as b", 'b.id', 'ai.ban_id')
        ->join("colors as cl", 'cl.id', 'ai.color_id')
        ->join("cities as ct", 'ct.id', 'ai.city_id')
        ->where('a.id', $id)
        // ->where('expired_at', '>=', Carbon::now()->format('Y-m-d'))
        ->with(['photos', 'supplies'])
        ->firstOrFail();

        Advertisement::query()
            ->where('id', $id)
            ->update([
                'view' => $advertisement->view + 1
            ]);

        return view('site.detail', compact('advertisement'));

    }
}