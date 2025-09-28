<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(8);
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view('dashboard.products.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:products,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
            'price'       => 'required|numeric|min:0|max:999999.99',
            'stock' =>       'required|integer|min:0',
        ]);
            $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('products', 'uploads');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('dashboard.products.index')
            ->with('success', 'تم إنشاء المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products.show', ['item' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(string $id)
{
    $product = Product::findOrFail($id);
    $parents = Category::all();
    return view('dashboard.products.edit', compact('product', 'parents'));
}

public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name'        => 'required|string|max:255',
        'category_id' => 'nullable|exists:categories,id',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable|string|max:1000',
        'price'       => 'required|numeric|min:0|max:999999.99',
        'stock'       => 'required|integer|min:0',
    ]);

    $old_image = $product->image;

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('products', 'uploads');
        $data['image'] = $path;
    }

    $product->update($data);

    if ($old_image && isset($data['image'])) {
        Storage::disk('uploads')->delete($old_image);
    }

    return redirect()->route('dashboard.products.index')
        ->with('success', 'تم تحديث المنتج بنجاح');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard.products.index')
            ->with('success','تم حذف المنتج بنجاح');
    }





}
