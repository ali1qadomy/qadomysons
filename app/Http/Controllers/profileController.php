<?php

namespace App\Http\Controllers;

use App\Models\branche;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        $userInfo = auth::user();
        $branche = branche::where('id', $userInfo->branche_id)->get();
        return view('profile.profile', compact('userInfo', 'branche'));
        // return $userInfo;
    }
    public function edit()
    {
    }
}
