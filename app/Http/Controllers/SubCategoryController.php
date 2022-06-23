<?php

namespace App\Http\Controllers;

use App\Models\subCategory;
use App\Http\Requests\StoresubCategoryRequest;
use App\Http\Requests\UpdatesubCategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use function Ramsey\Uuid\v1;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = subCategory::with('category')->get();
        $cat = category::all();
        return view('subcategory.subcategory', compact('sub', 'cat'));
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
     * @param  \App\Http\Requests\StoresubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubCategoryRequest $request)
    {

        try {
            $sub = new subCategory();
            $sub->create([
                'name' => ['en' => $request->subnameEn, 'ar' => $request->subnameAr],
                'description' => ['en' => $request->subdescEn, 'ar' => $request->subdescAr],
                'category_id' => $request->categorySelect
            ]);
            Alert::success('Success', 'Success Add');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::success('Failed', 'Failed To Add');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(subCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubCategoryRequest  $request
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubCategoryRequest $request, subCategory $subCategory)
    {
        try {
            $subCategory = subCategory::find($request->updatesub);
            $subCategory->update([
                'name' => ['en' => $request->usubnameEn, 'ar' => $request->usubnameAr],
                'description' => ['en' => $request->usubdescEn, 'ar' => $request->usubdescAr],
                'category_id' => $request->ucategorySelect,
            ]);
            Alert::success('Success', 'Success Update');
            return redirect()->route('subcategory.index');
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed Update');
            return redirect()->route('subcategory.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(subCategory $subCategory, Request $request)
    {
        try {
            $subCategory = subCategory::where('id', $request->deletesub)->delete();
            Alert::success('Success ', 'Success Delete');
            return redirect()->route('subcategory.index');
        } catch (\Throwable $th) {
            Alert::error('Failed ', 'Failed To[ Delete');
            return redirect()->route('subcategory.index');
        }
    }
}
