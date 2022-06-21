<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = category::all();
        return view('category.category', compact('cat'));
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
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        try {
            $cat = new category();
            $cat->create([
                'name' => $request->categoryName,
                'description' => $request->categoryDesc
            ]);
            Alert::success('Success', 'Success Add');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Add');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        try {
            $category = category::find($request->updatecategory);
            $category->update([
                'name' => $request->ucategoryName,
                'description' => $request->ucategoryDesc
            ]);
            Alert::success('Success', 'Success Update');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Update');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category, Request $request)
    {
      try {
        $category = category::find($request->deletecategory)->delete();
        Alert::success('Success','Success Delete');
        return redirect()->back();
      } catch (\Throwable $th) {
        Alert::error('Failed','Failed Delete');
        return redirect()->back();
      }
    }
}
