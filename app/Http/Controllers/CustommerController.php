<?php

namespace App\Http\Controllers;

use App\Models\custommer;
use App\Http\Requests\StorecustommerRequest;
use App\Http\Requests\UpdatecustommerRequest;

class CustommerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorecustommerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecustommerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\custommer  $custommer
     * @return \Illuminate\Http\Response
     */
    public function show(custommer $custommer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\custommer  $custommer
     * @return \Illuminate\Http\Response
     */
    public function edit(custommer $custommer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustommerRequest  $request
     * @param  \App\Models\custommer  $custommer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecustommerRequest $request, custommer $custommer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\custommer  $custommer
     * @return \Illuminate\Http\Response
     */
    public function destroy(custommer $custommer)
    {
        //
    }
}
