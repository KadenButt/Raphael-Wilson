<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomePageController extends Controller
{
    public function homePage(Request $request)
    {
        $categories = Category::all();
        return view('index', [
            'categories' => $categories
        ]);
    }
}
