<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use App\Http\Requests\StoreOrderdetailsRequest;
use App\Http\Requests\UpdateOrderdetailsRequest;

class OrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderdetails = Orderdetails::all();
        return $orderdetails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderdetailsRequest $request)
    {
        $orderdetails = new Orderdetails;

        $orderdetails->order_id=$request->order_id;
        $orderdetails->menu_id=$request->menu_id;
        $orderdetails->quantity=$request->quantity;
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Orderdetails $orderdetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orderdetails $orderdetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderdetailsRequest $request, Orderdetails $orderdetails)
    {
        $orderdetails = Orderdetails::find($request->id);

        $orderdetails->order_id=$request->order_id;
        $orderdetails->menu_id=$request->menu_id;
        $orderdetails->quantity=$request->quantity;

        $orderdetails->save();
        return $orderdetails;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orderdetails $orderdetails)
    {
        //
    }
}
