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
        $roles_list = array();

        foreach ($user->roles as $role) {
            array_push($roles_list, $role->title);
        }

        // Check Admin Role
        if (in_array('Admin', $roles_list)) {
            $reviews = Review::all();
        } else {
            $reviews = Review::where('user_id', '=', $user->id)->get();
        }
        
        return view('cruds.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return response()->json(['data' => $review, 'user' => $review->user, 'restaurant' => $review->restaurant]);
    }

    public function create()
    {
        abort_if(Gate::denies('review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return redirect(url('/') . '#restaurants');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'description' => 'required',
            'rating' => 'required',
        ]);
        
        $user = Auth::user();
        
        $review = new Review;
        $review->user_id = $user->id;
        $review->restaurant_id = $request->restaurant_id;
        $review->description = $request->description;
        $review->score = $request->rating;
        $review->save();

        // return redirect()->back();
        return redirect()->to(url()->previous() . '#restaurants');
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