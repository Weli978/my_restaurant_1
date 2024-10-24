<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return $menus;
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
    public function store(StoreMenuRequest $request)
    {
        $menu=new Menu;
        $menu->name=$request->name;
        $menu->price=$request->price;
        $menu->description=$request->description;
        $menu->category_id=$request->category_id;
        $menu->offers=$request->offers;
        $menu->allergens=$request->allergens;
        
        
        $menu->save();
        return $menu;
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu = Menu::find($request->id);

        $menu->name=$request->name;
        $menu->price=$request->price;
        $menu->description=$request->description;
        $menu->category_id=$request->category_id;
        $menu->offers=$request->offers;
        $menu->allergens=$request->allergens;
        
        
        $menu->save();
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
