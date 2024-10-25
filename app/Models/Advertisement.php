<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{AdvertisementPhoto, AdvertisementSupply};

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'created_by',
        'car_id',
        'model_id',
        'price',
        'currency_id',
        'status',
        'view',
    ];

    public function photos()
    {
        return $this->hasMany(AdvertisementPhoto::class, 'advertisement_id', 'id');
    }

    public function photo()
    {
        return $this->hasOne(AdvertisementPhoto::class, 'advertisement_id', 'id')
                    ->select(
                        'advertisement_id',
                        'photo'
                    )
                    ->orderBy('id');
    }

    public function supplies()
    {
        return $this->hasMany(AdvertisementSupply::class, 'advertisement_id', 'id')
           ->select(
            'advertisement_supplies.*',
            'cs.name'
           )
           ->join('car_supplies as cs', 'cs.id','advertisement_supplies.supply_id');
    }
}