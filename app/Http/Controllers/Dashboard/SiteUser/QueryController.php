<?php

namespace App\Http\Controllers\Dashboard\SiteUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteUser;


class QueryController extends Controller
{
    public function index()
    {
        $users = SiteUser::query()
                ->whereNotNull('email_verified_at')
                ->paginate();

        return view('dashboard.site-user.index', compact('users'));
    }
}