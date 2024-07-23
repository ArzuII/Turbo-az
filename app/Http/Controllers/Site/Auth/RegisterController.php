<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SiteUser;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view('site.auth.register');   
    }

    public function register(Request $request)  //validation yazmaq
    {
        $userCheck = SiteUser::query()
        ->where('email', $request->email)
        ->whereNotNull('email_verified_at')
        ->exists();

        if ($userCheck) 
            return to_route('register')->with('fail', self::MESSAGE_DUPLICATE_EMAIL);

        $code = rand(10000, 99999);
        $expired = time() + (60 * 10);
        
        $user = SiteUser::query()
                ->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'email_code' => $code,
                    'email_code_expired' => $expired,
                    'email' => $request->email,
                ]);

        $subject = "Turbo qeydiyyat tesdiqleme";
        $body = "Salam $request->name. Qeydiyyatdan keçdiyiniz üçün təşəkkürlər. <br> Hesabı təsdiqləmək üçün kod: $code. <br> Kod 10 dəqiqə ərzində keçərlidir.";   
        
        Mail::send('mail.standart', compact('body'), function($mail) use ($request, $subject){
            $mail->to($request->email)->subject($subject);     
        });

        return to_route('register.confirm', $user->id);
    }

    public function registerConfirmPage($user_id) 
    {
        $check = SiteUser::query()
                ->whereNull('email_verified_at')
                ->whereNotNull('email_code')
                ->whereNotNull('email_code_expired')
                ->where('id', $user_id)
                ->exists();

        if (!$check) 
            return to_route('register');
        
        return view('site.auth.register-confirm', compact('user_id'));   
    }

    public function registerConfirm(Request $request, $user_id)
    {
        $check = SiteUser::query()
                ->where('id', $user_id)
                ->where('email_code', $request->code)
                ->first();
        
        if (!$check) 
            return back()->with('fail', self::MESSAGE_WRONG_CODE);

        if ($check->email_code_expired < time())
            return back()->with('fail', self::MESSAGE_EXPIRED_CODE);

        SiteUser::query()
                ->where('id', $user_id)
                ->update([
                    'email_verified_at' => now(),
                    'email_code' =>null,
                    'email_code_expired' => null,
                ]);

        return to_route('index');
    }
}