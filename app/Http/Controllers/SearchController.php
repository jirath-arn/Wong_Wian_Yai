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

        return view('index', compact('categories', 'restaurants'));
    }
}