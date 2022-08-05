<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Http\Requests\StoreinvoiceRequest;
use App\Http\Requests\UpdateinvoiceRequest;
use App\Models\custommer;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = product::all();
        $person=User::all();


        // $product = product::all();
        return view('invoices.newInvoice', compact('product','person'));
        //  return $product->toArray() ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreinvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinvoiceRequest $request)
    {

        if ($request->action == "insert") {
            $customre = new custommer();
            $customre = ([
                'name' => $request->Cname,
                'phoneNumber' => $request->phone,
                'address' => $request->address,
                'created_at' => now()
            ]);
            $cust_id = DB::table('custommers')->insertGetId($customre);
            $invoice = new invoice();
            $invoice = [
                'custommer_id' => $cust_id,
                'salesperson' => $request->salesperson,
                'created_at' => now()
            ];
            $invoice_id = DB::table('invoices')->insertGetId($invoice);
            $invoices = invoice::find($invoice_id);
            foreach ($request->product as $key => $value) {
                if ($value != "") {
                    $invoices->products()->attach($request->product[$key], [
                        'quantity' => $request->units[$key],
                        'price' => $request->price[$key],
                        'discount' => $request->Discount[$key],
                        'totalPrice' => $request->total[$key],
                        'totalInvoice' => $request->totalinvoice,
                        'created_at'=>now()
                    ]);
                }
            }
            Alert::success('Success', 'Success Added new Product');
            return redirect()->route('invoice.index');
        } elseif ($request->action == "update") {

            $customer = custommer::find($request->idcustomer);
            $customer->update([
                'fullname' => $request->Cname,
                'phoneNumber' => $request->phone,
                'address' => $request->address,
                'created_at' => now(),
            ]);
            $invoice = invoice::find($request->idinvoice);
            $invoice->update([
                'custommer_id' => $customer->id,
                'salesperson' => $request->salesperson,
                'created_at' => now()
            ]);
            $invoices = invoice::where('id', $invoice->id)->with('products', function ($q) {
                $q->select('product_id')->get();
            })->first();
            foreach ($invoices->products as $item) {
                $invoices->products()->detach($item->product_id);
            }

            foreach ($request->product as $key => $value) {
                if ($value != "") {
                    $invoices->products()->attach($request->product[$key], [
                        'quantity' => $request->units[$key],
                        'price' => $request->price[$key],
                        'discount'=>$request->Discount[$key],
                        'totalPrice' => $request->total[$key],
                        'totalInvoice' => $request->totalinvoice,
                    ]);
                }
            }
            Alert::success('Success', 'Success Added new Product');
            return redirect()->route('invoice.index');
        } elseif ($request->action == "delete") {
            $customer = custommer::find($request->idcustomer);
            $invoice = invoice::find($request->idinvoice);

            $invoices = invoice::where('id', $invoice->id)->with('products', function ($q) {
                $q->select('product_id')->get();
            })->first();
            foreach ($invoices->products as $item) {
                $invoices->products()->detach($item->product_id);
            }
            $invoice->delete();
            $customer->delete();
            Alert::success('Success', 'Success Added new Product');
            return redirect()->route('invoice.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Respo
     *

     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinvoiceRequest  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinvoiceRequest $request, invoice $invoice)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
    public function invoiceget($id)
    {
        /* $invoice = DB::table('invoice_product')->where('invoice_id', $id)
            ->leftJoin('invoices', 'invoice_product.invoice_id', '=', "invoices.id")
            ->leftjoin('custommers', 'invoices.custommer_id', '=', 'custommers.id')
            ->leftjoin('products', 'invoice_product.product_id', '=', 'products.id')->get();*/
        $invoice = invoice::where('id', $id)->with(['products' => function ($q) {
            $q->select();
        }, 'custommer' => function ($q) {
            $q->select();
        }])->get();

        //$invoice = invoice::where('id',5)->with('custommers')->get();


        return response()->json([
            'invoice' => $invoice,
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function getlastinvoice()
    {
        $lastId = invoice::select('id')->orderby('id', 'desc')->limit(1)->get();
        return response()->json([
            'lastid' => $lastId,
            'status' => true

        ]);
    }
}
