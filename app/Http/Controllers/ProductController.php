<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\image as ModelsImage;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = product::with('image')->get();
        $scbCat = subCategory::select('id', 'name')->get();
        return view('product.product', compact('pro', 'scbCat'));
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
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {
        $newProduct = [
            'name' => $request->productname,
            'subcategory_id' => $request->ProdSubCategory,
            'description' => $request->productdesc,
            'created_at' => now()
        ];
        $prod_id = DB::table('products')->InsertGetId($newProduct);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $newFile = Str::random(8) . '.' . $ext;
            $filebig = Image::make($file)->resize(300,300);
            $filethumbo = Image::make($file)->resize(50,50);
            $filethumbo->save(public_path('/images/Thumbo/'.$newFile),100 );
            $filebig->save(public_path('/images/'.$newFile),100 );
        }
        $image = [
            'url' => $newFile,
            'imageable_type' => 'App\Models\product',
            'imageable_id' => $prod_id,
        ];
        ModelsImage::create($image);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        $product = product::where('id', $request->updateproduct)->update([
            'name' => $request->uproductname,
            'description' => $request->uproductdesc,
            'subcategory_id' => $request->uProdSubCategory,
        ]);
        if ($request->hasFile('Uimage')) {
            $file = $request->file('Uimage');
            $ext = $file->getClientOriginalExtension();
            $newFile = time() . '.' . $ext;
            $file->move(public_path('/images'), $newFile);
        }
        $image = [
            'url' => $newFile,
            'imageable_type' => 'App\Models\product',
            'imageable_id' => $request->updateproduct,
        ];
        DB::table('images')->where('imageable_id', $request->updateproduct)->update($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, Request $request)
    {
        $product = product::find($request->deleteproduct)->delete();
        return redirect()->route('product.index');
    }
}
