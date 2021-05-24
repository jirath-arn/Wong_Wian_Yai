<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('restaurant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $restaurants = Restaurant::all();
        // return view('admin.restaurants.index', compact('restaurants'));
        return view('cruds.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        abort_if(Gate::denies('restaurant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $restaurants = Restaurant::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // return view('admin.restaurants.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10|unique:buses',
        // ]);
        
        // $restaurant = Restaurant::find($request->category_id);
        // $restaurant->buses()->create([
        //     'license_plate' => $request->license_plate,
        //     'latitude' => 14.0695183,
        //     'longitude' => 100.6032949,
        // ]);
        
        // return redirect()->route('admin.restaurants.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $restaurants = Restaurant::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $restaurant->load('route');
        // return view('admin.restaurants.edit', compact('restaurants', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10',
        // ]);
        
        // $restaurant = Restaurant::find($id);
        // $restaurant->route_id = $request->route_id;
        // $restaurant->license_plate = $request->license_plate;
        // $restaurant->save();
        // return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $restaurant->delete();
        // return redirect()->route('admin.restaurants.index');
    }
}