<?php

namespace App\Http\Controllers;

use App\Models\branche;
use App\Http\Requests\StorebrancheRequest;
use App\Http\Requests\UpdatebrancheRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bra = branche::with('user')->get();
        $user = User::all();
        return view('branche.branche', compact('bra', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebrancheRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebrancheRequest $request)
    {
        try {
            $branche = new branche();
            $branche->create([
                'name' => ['en' => $request->BrancheNameEn, 'ar' => $request->BrancheNameAr]
            ]);
            Alert::Success('Success', 'Success Add');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Add');
            return redirect()->route('branche.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function show(branche $branche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function edit(branche $branche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebrancheRequest  $request
     * @param  \App\Models\branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebrancheRequest $request, branche $branche)
    {
        try {
            $branche->update([
                'name' => ['en' => $request->uBrancheNameEn, 'ar' => $request->uBrancheNameAr]
            ]);
            Alert::success('Success', 'Success Update');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Add');
            return redirect()->route('branche.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branche  $branche
     * @return \Illuminate\Http\Response
     */
    public function destroy(branche $branche, Request $request)
    {
        try {
            $branche = branche::where('id', $request->deletebranche)->first();
            $branche->delete();
            Alert::success('Success', 'Success Delete');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Delete');
            return redirect()->back();
        }
    }
}
