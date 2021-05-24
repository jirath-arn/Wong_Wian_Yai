<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\Category;

class SearchController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $restaurants = Restaurant::inRandomOrder()->get();
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

        return view('search', compact('categories', 'restaurants', 'reviews'));
    }

    public function show(Request $request, $name)
    {
        $restaurant = Restaurant::where('name', 'like', $name)->get();
        $reviews = Review::where('restaurant_id', '=', $restaurant[0]->id)->orderBy('updated_at', 'DESC')->simplePaginate(5);
        $count_pages = Review::where('restaurant_id', '=', $restaurant[0]->id)->orderBy('updated_at', 'DESC')->paginate(5)->lastPage();

        $score_sum_reviews = 0;
        $count_reviews = count($restaurant[0]->reviews);
        $score_avg_reviews = number_format(0, 1);

        foreach ($restaurant[0]->reviews as $review) {
            $score_sum_reviews += $review->score;
        }

        if ($count_reviews > 0) {
            $score_avg_reviews = number_format($score_sum_reviews / $count_reviews, 1);
        }

        $rating = array('score_reviews' => $score_avg_reviews, 'count_reviews' => $count_reviews, 'count_pages' => $count_pages);

        return view('details', compact('restaurant', 'rating', 'reviews'));
    }
}