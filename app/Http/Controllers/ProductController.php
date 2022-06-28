<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\image as ModelsImage;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;

use RealRashid\SweetAlert\Facades\Alert as Alert;



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
        try {
            $newProduct = [
                'name' => collect(['en' => $request->productnameEn, 'ar' => $request->productnameAr])->toJson(),
                'subcategoryid' => $request->ProdSubCategory,
                'description' => collect(['en' => $request->productdescEn, 'ar' => $request->productdescAr])->toJson(),
                'quantity' => $request->quantity,
                'avaliabity' => $request->avaliable,
                'barCode' => $request->barcode,
                'created_at' => now(),
            ];
            $prod_id = DB::table('products')->InsertGetId($newProduct);
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $newFile = Str::random(8) . '.' . $ext;
                    $filebig = Image::make($file)->resize(300, 300);
                    $filethumbo = Image::make($file)->resize(50, 50);
                    $filethumbo->save(public_path('/images/Thumbo/' . $newFile), 100);
                    $filebig->save(public_path('/images/' . $newFile), 100);
                    $image = [
                        'url' => $newFile,
                        'imageable_type' => 'App\Models\product',
                        'imageable_id' => $prod_id,
                    ];
                    ModelsImage::create($image);
                }
            }

            Alert::success('Success', 'Success Added new Product');
            return redirect()->route('product.index');
        } catch (\Exception $th) {
            return $th;
          //  Alert::error('Failed ', $th->getMessage());
         //   return redirect()->route('product.index');
        }
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
        try {
            $product = product::where('id', $request->updateproduct)->update([
                'name' => ['en' => $request->uproductnameEn, 'ar' => $request->uproductnameAr],
                'description' => ['en' => $request->uproductdescEn, 'ar' => $request->$request->uproductdescAr],
                'subcategoryid' => $request->uProdSubCategory,
            ]);
            if ($request->hasFile('Uimage')) {
                $files = $request->file('Uimage');
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $newFile = time() . '.' . $ext;
                    $filebig = Image::make($file)->resize(300, 300);
                    $filethumbo = Image::make($file)->resize(50, 50);
                    $filebig->save(public_path('/images/' . $newFile), 80);
                    $filethumbo->save(public_path('/images/Thumbo/' . $newFile), 80);
                    $image = [
                        'url' => $newFile,
                        'imageable_type' => 'App\Models\product',
                        'imageable_id' => $request->updateproduct,
                    ];
                    DB::table('images')->where('imageable_id', $request->updateproduct)->update($image);
                }
            }

            Alert::success('Success', 'Success Update Product');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            Alert::error('Failed', 'Failed To Update');
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, Request $request)
    {
        try {
            $image_path = ModelsImage::where('imageable_id', $request->deleteproduct)->pluck('url');
            foreach ($image_path as $i) {
                if (File::exists(public_path('/images/' . $i)) || File::exists(public_path('/images/Thumbo/' . $i))) {
                    File::delete(public_path('/images/' . $i));
                    File::delete(public_path('/images/Thumbo/' . $i));
                    ModelsImage::where('imageable_id', $request->deleteproduct)->delete();
                } else {
                    modelsImage::table('images')->where('imageable_id', $request->deleteproduct)->delete();
                    $product = product::find($request->deleteproduct)->delete();
                    Alert::success('Success', 'There\'s no image To Delete In file');
                    return redirect()->route('product.index');
                }
            }
            $product = product::find($request->deleteproduct)->delete();
            Alert::success('Success', 'Success To Delete');
            return redirect()->route('product.index');
        } catch (\Exception $th) {
            return $th;
            Alert::error('Failed', 'Failed To Delete');
            return redirect()->route('product.index');
        }
    }
}
