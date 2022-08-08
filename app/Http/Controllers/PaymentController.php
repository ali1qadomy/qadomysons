<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\custommer;
use App\Models\invoice;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = custommer::all();
        return view('invoices.recieptInvoice', compact('customer'));
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
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
       try {
        foreach ($request->price as $key => $value) {
            if ($value != "") {
                $payment = new Payment();
                $payment->customerName = $request->Cname;
                $payment->paymentAmount = $request->price[$key];
                $payment->Discount = $request->Discount[$key];
                $payment->invoice_id = $request->invoiceId;
                $payment->paymentMethod = $request->paymentMethod[$key];
                $payment->save();
            }
        }
        Alert::success("Success reciption invoice","Done");
        return redirect()->back();
       } catch (\Throwable $th) {
        Alert::error("Failed reciption invoice","Failed");
        return redirect()->back();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
    public function cutsomDetails($id)
    {
        $customer = custommer::findorFail($id);
        return response()->json([
            'customer' => $customer,
            'status' => true
        ]);
    }
    public function getinvoices($id)
    {
        $invoice = invoice::where('custommer_id', $id)->get();
        return response()->json([
            'invoice' => $invoice,
            'status' => true
        ]);
    }
}
