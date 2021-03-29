<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::inRandomOrder()->get();
        $products = Product::where('featured', true)->take(8)->inRandomOrder(9)->get();
        return view('index')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
