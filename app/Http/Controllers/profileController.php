<?php

namespace App\Http\Controllers;

use App\Models\branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index()
    {
        $userInfo = Auth::user();
        $branche = branche::where('id', $userInfo->branche_id)->get();
        return view('profile.profile', compact('userInfo', 'branche'));
    }
    public function editUser(Request $request)
    {
        return $request;
    }
}
