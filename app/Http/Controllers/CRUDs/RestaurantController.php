<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Auth;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Image;

class RestaurantController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('restaurant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $roles_list = array();

        foreach ($user->roles as $role) {
            array_push($roles_list, $role->title);
        }

        // Check Admin Role
        if (in_array('Admin', $roles_list)) {
            $restaurants = Restaurant::all();
        } else {
            $restaurants = Restaurant::where('user_id', '=', $user->id)->get();
        }

        // Rating
        $reviews = [];

        for ($i = 0; $i < count($restaurants); $i++) {

            $score_sum_reviews = 0;
            $count_reviews = count($restaurants[$i]->reviews);
            $score_avg_reviews = number_format(0, 1);

            foreach ($restaurants[$i]->reviews as $review) {
                $score_sum_reviews += $review->score;
            }

            if ($count_reviews > 0) {
                $score_avg_reviews = number_format($score_sum_reviews / $count_reviews, 1);
            }
            
            $reviews[$i] = array('score_reviews' => $score_avg_reviews, 'count_reviews' => $count_reviews);
        }
        
        return view('cruds.restaurants.index', compact('restaurants', 'reviews'));
    }

    public function show(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $score_sum_reviews = 0;
        $count_reviews = count($restaurant->reviews);
        $score_avg_reviews = number_format(0, 1);

        foreach ($restaurant->reviews as $review) {
            $score_sum_reviews += $review->score;
        }

        if ($count_reviews > 0) {
            $score_avg_reviews = number_format($score_sum_reviews / $count_reviews, 1);
        }

        $rating = array('score_reviews' => $score_avg_reviews, 'count_reviews' => $count_reviews);
        
        return response()->json(['data' => $restaurant, 'user' => $restaurant->user, 'category' => $restaurant->category, 'rating' => $rating]);
    }

    public function create()
    {
        abort_if(Gate::denies('restaurant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categories = Category::all()->pluck('title', 'id');

        return view('cruds.restaurants.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:restaurants',
            'description' => 'required',
            'telephone' => 'required|max:10',
            'address' => 'required',
            'categories' => 'required',
            'images.*' => 'required|mimes:jpg,png',
        ]);
        
        if ($request->hasfile('images')) {

            $user = Auth::user();

            $restaurant = new Restaurant;
            $restaurant->user_id = $user->id;
            $restaurant->category_id = $request->categories;
            $restaurant->name = $request->name;
            $restaurant->description = $request->description;
            $restaurant->telephone = $request->telephone;
            $restaurant->address = $request->address;
            $restaurant->website = $request->website;
            $restaurant->save();

            $images = $request->file('images');

            foreach($images as $image) {
                
                $name = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs($user->id . '/restaurant_' . $restaurant->id, $name, 'public');
                $size = $image->getSize();

                $pic = new Image;
                $pic->restaurant_id = $restaurant->id;
                $pic->filename = $name;
                $pic->path = $path;
                $pic->size = $size;
                $pic->save();
            }
         }

        return redirect(route('restaurants.index') . '#restaurants');
    }

    public function edit(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('cruds.restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'telephone' => 'required|max:10',
            'address' => 'required',
        ]);

        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->telephone = $request->telephone;
        $restaurant->address = $request->address;
        $restaurant->website = $request->website;
        $restaurant->save();
        
        return redirect(route('restaurants.index') . '#restaurants');
    }

    public function destroy(Restaurant $restaurant)
    {
        abort_if(Gate::denies('restaurant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $restaurant->images()->delete();
        $restaurant->reviews()->delete();
        $restaurant->delete();
        
        return redirect(route('restaurants.index') . '#restaurants');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:restaurants,id',
        ]);

        $restaurants = Restaurant::whereIn('id', request('ids'))->get();
        foreach ($restaurants as $restaurant) {
            $restaurant->images()->delete();
            $restaurant->reviews()->delete();
            $restaurant->delete();
        }
        return redirect(route('restaurants.index') . '#restaurants');
    }
}