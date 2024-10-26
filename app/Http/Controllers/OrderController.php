<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use App\Models\Orderdetails;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return $order;
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
    public function store(StoreOrderRequest $request)
    {
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->order_type = $request->order_type;
        $order->order_status = $request->order_status;
        $order->order_total = $request->order_total;

        $order->save();
        return $order;
    }

    public function getOrderdetails($order_id){
        $order = Order::find($order_id);
        //user 
        $order->user = User::find($order->user_id);
        //order details
        $order->order_details = Orderdetails::where('order_id', $order->id)->get();
        //menu
        foreach ($order->order_details as $order_detail){
            $menu = Menu::find($order_detail->menu_id);
            $order_detail->menu_name = $menu->name;
            $order_detail->menu_price = $menu->price;
        }
        return $order;
    }		
     




    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order = Order::find($request->id);

        $order->user_id = $request->user_id;
        $order->order_type = $request->order_type;
        $order->order_status = $request->order_status;
        $order->order_total = $request->order_total;

        $order->save();
        return $order;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
