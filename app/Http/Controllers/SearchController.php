<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
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

    public function show(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);

        return view('detail', compact('restaurant'));
    }
}