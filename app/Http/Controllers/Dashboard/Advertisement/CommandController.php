<?php

namespace App\Http\Controllers\Dashboard\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Mail;

class CommandController extends Controller
{
    public function approve($id)
    {
        $advertisement = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'su.email'
            )
            ->where('a.status', 1)
            ->where("a.id",$id)
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->first();

        if (!$advertisement) {
            return to_route('dashboard.advertisement.index')->with('fail', '    Advertisement already exists.');

        // $user = User::query()
        //     ->where('id', $advertisement->created_by)
        //     ->first();
        }

        Advertisement::query()
            ->where('id', $id)
            ->update([
                'status' => 2
            ]);

        $body = 'Elanınız dərc olundu. Elanın linki ';

        Mail::send('mail.standart', compact('body'), function ($message) use ($advertisement) {
            $message->to("$advertisement->email")->subject('Elanınız tısdiqləndi');
        });

        return redirect()->back();
    }

    public function reject($id)
    {
        $advertisement = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'su.email'
            )
            ->where('a.status', 1)
            ->where("a.id",$id)
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->first();

        if (!$advertisement) {
            return to_route('dashboard.advertisement.index')->with('fail', '    Advertisement already exists.');
        }

        Advertisement::query()
            ->where('id', $id)
            ->update([
                'status' => 0
            ]);

        $body = 'Elanınız dərc olunmadı';

        Mail::send('mail.standart', compact('body'), function ($message) use ($advertisement) {
            $message->to("$advertisement->email")->subject('Elan müraciətiniz rədd edildi');
        });
    }

}
