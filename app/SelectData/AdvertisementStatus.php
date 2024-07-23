<?php

namespace App\SelectData;

class AdvertisementStatus
{
    public static function get($status = null)
    {
        $data = [
            [
                'id' => 0,
                'name' => 'Qəbul edilmədi'      
            ],
            [
                'id' => 1,
                'name' => 'Gözləmədə'      
            ],
            [
                'id' => 2,
                'name' => 'Təsdiq'      
            ],      
        ]; 
        
        if ($status) 
        {
            foreach ($data as $datum) 
            {
                if ($datum['id'] == $status) 
                    return $datum['name'];       
            }
        }
    }
}