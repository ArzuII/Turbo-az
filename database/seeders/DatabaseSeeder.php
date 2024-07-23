<?php

namespace Database\Seeders;
use App\Models\Ban;
use App\Models\FuelType;
use App\Models\Gear;
use App\Models\Color;
use App\Models\City;
use App\Models\Currency;
use App\Models\CarSupply;




// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Ban::query()
            ->insert([
                [
                    'name' => 'Avtobus'
                ],
                [
                    'name' => 'Dartqı'
                ],
                [
                    'name' => 'Furqon'
                ],
                [
                    'name' => 'Moped'
                ],
                [
                    'name' => 'Motosiklet'
                ],
                [
                    'name' => 'Sedan'
                ],
                [
                    'name' => 'SUV'
                ],
                [
                    'name' => 'Fayton'
                ],
                [
                    'name' => 'Karavan'
                ],
            ]);
        
        FuelType::query()
        ->insert([
            [
                'name' => 'Benzin'
            ],
            [
                'name' => 'Qaz'
            ],
            [
                'name' => 'Dizel'
            ],
            [
                'name' => 'Hibrid'
            ],
            [
                'name' => 'Elektro'
            ],
            [
                'name' => 'Plug in Hubrid'
            ],
        ]);

        Gear::query()
        ->insert([
            [
                'name' => 'Arxa'
            ],
            [
                'name' => 'Ön'
            ],
            [
                'name' => 'Tam'
            ],
        ]);

        Color::query()
        ->insert([
            [
                'name' => 'Ağ'
            ],
            [
                'name' => 'Qara'
            ],
            [
                'name' => 'Qırmızı'
            ],
            [
                'name' => 'Mavi'
            ],
            [
                'name' => 'Silver'
            ],
            [
                'name' => 'Çəhrayı'
            ],
        ]);

        City::query()
        ->insert([
            [
                'name' => 'Bakı'
            ],
            [
                'name' => 'Sumqayıt'
            ],
            [
                'name' => 'Xırdalan'
            ],
            [
                'name' => 'Qusar'
            ],
            [
                'name' => 'Quba'
            ],
            [
                'name' => 'Gəncə'
            ],
            [
                'name' => 'Şamaxı'
            ],
            [
                'name' => 'Salyan'
            ],
            [
                'name' => 'Siyəzən'
            ],
            [
                'name' => 'Xızı'
            ],
            [
                'name' => 'Mingəçevir'
            ],
            [
                'name' => 'Kürdəmir'
            ],
        ]);

        Currency::query()
        ->insert([
            [
                'name' => 'Manat',
                'code' => 'AZN',
            ],
            [
                'name' => 'Dollar',
                'code' => 'USD',
            ],
            [
                'name' => 'Avro',
                'code' => 'EUR',
            ],
        ]);

        CarSupply::query()
        ->insert([
            [
                'name' => 'Yüngül lehimli disklər',
            ],
            [
                'name' => 'ABS',
            ],
            [
                'name' => 'Lyuk',
            ],
            [
                'name' => 'Yağış sensoru',
            ],           
            [
                'name' => 'Mərkəzi qapanma',
            ],            
            [
                'name' => 'Park radarı',
            ],            
            [
                'name' => 'Kondisioner',
            ],            
            [
                'name' => 'Oturacaqların isidilməsi',
            ],  
            [
                'name' => 'Oturacaqların ventilyasiyası',
            ],          
            [
                'name' => 'Dəri salon',
            ],
            [
                'name' => 'Ksenon lampalar',
            ],        
        ]);
            
        // \App\Models\User::factory(count:10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('salam')
        ]);
    }
}