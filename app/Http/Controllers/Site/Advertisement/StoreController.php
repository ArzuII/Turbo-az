<?php

namespace App\Http\Controllers\Site\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\AdvertisementInfo;
use App\Models\AdvertisementSupply;
use App\Models\AdvertisementPhoto;


class StoreController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'car_id' =>'required|integer|exists:cars,id',
            'year' =>'required|integer|min:1904|max:' . date('Y'),
            'supplies_id' =>'nullable|array',
            'supplies_id.*' =>'nullable|integer|exists:car_supplies,id',
            'photos' => 'required|array',
            'photos.*' =>'required|image|max:5000|mimes:png,jpg,jpeg',    
        ]);
        
        $advertisement = Advertisement::query()
        ->create([
            'body' => $request->body,
            'created_by' => auth()->guard('site')->user()->id,
            'car_id' => $request->car_id,
            'model_id' => $request->model_id,
            'price' => $request->price,
            'currency_id' => $request->currency_id,            
        ]);

        $this->saveInfo($request, $advertisement->id);
        $this->saveSupply($request, $advertisement->id);
        $this->savePhotos($request, $advertisement->id);


            
        return redirect()->back()->with('success', 'Elanınıza baxış keçiriləcək.');  
    }

    private function saveInfo(Request $request, $advertisementId)
    {
        AdvertisementInfo::query()
        ->create([
            'advertisement_id' => $advertisementId,
            'fuel_type_id' => $request->fuel_type_id,
            'gear_id' => $request->gear_id,
            'ban_id' => $request->ban_id,
            'year' => $request->year,
            'color_id' => $request->color_id,
            'distance' => $request->distance,
            'vin_code' => $request->vin_code,
            'city_id' => $request->city_id,
        ]);   
    }

    private function saveSupply(Request $request, $advertisementId)
    {
        $insertSupplies = [];

        foreach ($request->supply_ids as $key => $supply_id) 
        {
            $insertSupplies[] = [
                'advertisement_id' => $advertisementId,
                'supply_id' => $supply_id      
            ];
        }
        
        AdvertisementSupply::query()
        ->insert($insertSupplies);
    }

    private function savePhotos(Request $request, $advertisementId)
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        $insertPhoto = [];
        foreach ($request->photos as $photo) 
        {
            $filename = uniqid(). '.' . $photo->extension();
            $filenameWithUpload = "/storage/cars/$year/$month/$day/$filename";
            $photo->storeAs("public/cars/$year/$month/$day", $filename);

            $insertPhoto[] = [
                'advertisement_id' => $advertisementId,
                'photo' => $filenameWithUpload    
            ];
        }
        AdvertisementPhoto::query()
                ->insert($insertPhoto);

        return $request;
    }
}