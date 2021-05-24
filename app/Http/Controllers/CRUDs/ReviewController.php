<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $reviews = Review::all();
        // return view('admin.reviews.index', compact('reviews'));
        return view('cruds.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        abort_if(Gate::denies('review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $reviews = Review::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // return view('admin.reviews.create', compact('reviews'));
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
        
        // $review = Review::find($request->category_id);
        // $review->buses()->create([
        //     'license_plate' => $request->license_plate,
        //     'latitude' => 14.0695183,
        //     'longitude' => 100.6032949,
        // ]);
        
        // return redirect()->route('admin.reviews.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        abort_if(Gate::denies('review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $reviews = Review::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $review->load('route');
        // return view('admin.reviews.edit', compact('reviews', 'review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10',
        // ]);
        
        // $review = Review::find($id);
        // $review->route_id = $request->route_id;
        // $review->license_plate = $request->license_plate;
        // $review->save();
        // return redirect()->route('admin.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $review->delete();
        // return redirect()->route('admin.reviews.index');
    }
}