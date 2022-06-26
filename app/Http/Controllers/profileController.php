<?php

namespace App\Http\Controllers;

use App\Models\branche;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function index()
    {
        $userInfo = Auth::user();
        $branche = branche::where('id', $userInfo->branche_id)->get();
        return view('profile.profile', compact('userInfo', 'branche'));
    }
    public function editUser(Request $request, User $user)
    {
        $user = User::where('id', $request->userupdate)->get();
        $user = [
            'name' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        DB::table('users')->where('id', $request->userupdate)->update($user);
        return redirect()->back();
    }
}
