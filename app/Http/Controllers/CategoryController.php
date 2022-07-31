<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Client\Response;
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

    public function  getCategory()
    {
        $category = category::all();
        if ($category->count() > 0) {
            return response()->json([
                "data" => $category,
                "message" => "all category",
                "status" => true
            ]);
        } else {
            return response()->json([
                "message" => "no category",
                "status" => false
            ]);
        }
    }
    public function  addCategory(Request $request)
    {
        $category = new category();
        $category->create([
            'name' => ['en' => $request->categoryName, 'ar' => $request->categoryNamear],
            'description' => $request->categorydesc
        ]);
        return response()->json([
            'message' => "success to add new category",
            'status' => true
        ]);
    }
    public function updateCategory(Request $request)
    {
        $category = category::where('id', $request->id)->first();
        $category->update([
            'name' => $request->categoryName,
            'description' => $request->categoryDesc
        ]);
        if ($category->count() > 0) {
            return Response()->json([
                'message' => "succsfull update",
                'status' => true
            ]);
        } else {
            return Response()->json([
                'message' => "something is wrong",
                'status' => false
            ]);
        }
    }
    public function deleteCategory(Request $request)
    {
        $category = category::where('id', $request->id)->delete();
        if ($category->count() > 0) {
            return Response()->json([
                'message' => "success delete",
                'status' => true
            ]);
        } else {
            return Response()->json([
                'message' => "unsuccess delete",
                'status' => false
            ]);
        }
    }
    public function readtable()
    {
        $category = category::all();
        return response()->json([
            'category' => $category
        ]);
    }
    public function  addCategories(Request $request)
    {
        $category = new category();
        $category->create([
            'name' => ['en' => $request->categorynameen, 'ar' => $request->categorynamear],
            'description' => ['en' => $request->categorydescen, 'ar' => $request->categorydescar]
        ]);
        Alert::success('Success', 'Success Add');
        return response()->json([
            'message' => '',
            'status' => true
        ]);
    }
    public function updateCategories($id)
    {
        $cat = category::where('id', $id)->get();
        if ($cat) {
            return response()->json([
                'status' => "200",
                "category" => $cat
            ]);
        }
    }
    public function editupdatecategory(Request $request, $id)
    {
        $cat = category::where('id', $id)->update([
            'name' => ['en' => $request->categorynameen, 'ar' => $request->categorynamear],
            'description' => ['en' => $request->categorydescen, 'ar' => $request->categorydescar],
            'updated_at' => now()
        ]);
        return response()->json([
            'message' => 'updated',
            'status' => true
        ]);
    }
    public function deletecategorymodel($id)
    {
        $category = category::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => "deleted",
            'category' => $category

        ]);
    }
}
