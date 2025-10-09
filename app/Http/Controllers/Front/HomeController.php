<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Spare;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $products_media = Product::latestProduct(6)->get();
        $category_home = Category::latestCategory(2)->get();
        $productsOfCateory = Product::ofCategoryName('الصيانة')->get();

        return view('front.index', compact(
            'products',
            'categories',
            'products_media',
            'category_home',
            'productsOfCateory'
        ));
    }
    public function showProduct(Product $product)
    {
        return view('front.show-product', compact('product'));
    }
    public function allProducts()
    {
        $products = Product::all();
        return view('front.products', compact('products'));
    }
    public function about()
    {
        $category_about = Category::latestCategory(3)->get();
        return view('front.about', compact('category_about'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $spares = Spare::where('id', 'LIKE', "%{$query}%")->get();

        return view('front.search', compact('spares', 'query'));
    }
    
}
