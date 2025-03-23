<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $vd = $request->validate(
            [
                'category-text' => 'required|string|max:255',
            ],
            [
                'category-text.required' => 'The category name is required.',
                'category-text.string' => 'The category name must be a string.',
                'category-text.max' => 'The category name must not exceed 255 characters.',
            ]
        );

        //check if category is uquie
        $category = Category::where([
            'category_name' => $vd['category-text']
        ])->first();

        if ($category != null) {
            $error = new MessageBag;
            $error->add('Category', 'category name is already in use');
            return redirect()->back()->withErrors($error);
        }



        Category::create([
            'category_name' => $vd['category-text']
        ]);

        return redirect()->back()->with('success', 'Category Created');    }
}
