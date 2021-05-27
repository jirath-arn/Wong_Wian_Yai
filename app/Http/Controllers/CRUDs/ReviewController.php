<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $user = Auth::user();

        // Check Admin
        if ($user->roles[0]->id == 1) {
            $reviews = Review::all();

        } else {
            $reviews = Review::where('user_id', '=', $user->id)->get();
        }
        
        return view('cruds.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return response()->json(['data' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
        $request->validate([
            'description' => 'required',
        ]);


        dd($request->restaurant_id);
        Review::create($request->all());

        return redirect(route('reviews.index') . '#reviews');
    }

    public function edit(Review $review)
    {
        abort_if(Gate::denies('review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('cruds.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::find($id);
        $review->description = $request->description;
        $review->score = $request->rating;
        $review->save();
        
        return redirect(route('reviews.index') . '#reviews');
    }

    public function destroy(Review $review)
    {
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $review->delete();
        
        return redirect(route('reviews.index') . '#reviews');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:reviews,id',
        ]);

        $reviews = Review::whereIn('id', request('ids'))->get();
        foreach ($reviews as $review) {
            $review->delete();
        }
        return redirect(route('reviews.index') . '#reviews');
    }
}