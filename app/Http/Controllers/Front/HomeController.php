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
        $products = Product::paginate(8);
        return view('front.products', compact('products'));
    }
    public function about()
    {
        $category_about = Category::latestCategory(3)->get();
        return view('front.about', compact('category_about'));
    }

    public function search(Request $request)
    {
        $query = trim($request->input('query'));

        $arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $query = str_replace($arabicNumbers, $englishNumbers, $query);

        $normalize = function ($text) {
            $text = str_replace(['أ', 'إ', 'آ'], 'ا', $text);
            $text = str_replace(['ة'], 'ه', $text);
            return $text;
        };
        $queryNormalized = $normalize($query);

        $products = collect();
        $spares = collect();

        if (is_numeric($query)) {
            $spares = Spare::where('id', $query)->get();
        } else {
            $products = Product::whereRaw("REPLACE(REPLACE(REPLACE(name,'أ','ا'),'إ','ا'),'ة','ه') LIKE ?", ["%{$queryNormalized}%"])
                ->orWhereRaw("REPLACE(REPLACE(REPLACE(description,'أ','ا'),'إ','ا'),'ة','ه') LIKE ?", ["%{$queryNormalized}%"])
                ->get();
        }

        return view('front.search', compact('products', 'spares', 'query'));
    }
}
