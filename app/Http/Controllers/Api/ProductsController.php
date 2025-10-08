<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductResource::collection(Product::all());
        $data = [
            'msg' => "return all data products table",
            'status' => 200,
            'data' => $products
        ];
        return response()->json($data);
    }
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            $data = [
                'msg' => 'return one recoed from products table',
                'status' => 200,
                'data' => new ProductResource($product)
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'msg' => 'no such id',
                'status' => 404,
                'data' => null,
            ];
            return response()->json($data, 404);
        }
    }

    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:products,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
            'price'       => 'required|numeric|min:0|max:999999.99',
            'stock' =>       'required|integer|min:0',
        ]);

        if($validate->fails()){
            return response()->json([
                'msg' => 'Validation required',
                'status' => 205,
                'data' => $validate->errors()
            ]);
        }

        $data = $request->only([
        'name',
        'image',
        'category_id',
        'price',
        'stock',
        'description',
        'slug'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')
                ->store('products', 'uploads');
        }

        $product = Product::create($data);

        return response()->json([
            'msg' => 'Created Successfully',
            'status' => 200,
            'data' => new ProductResource($product)
        ]);

    }

    public function update(Request $request, string $id){
        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:products,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
            'price'       => 'required|numeric|min:0|max:999999.99',
            'stock' =>       'required|integer|min:0',
        ]);
        $product = Product::findOrFail($id);
        $old_image = $product->image;
        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')
                ->store('products', 'uploads');
        }

        $product->update($data);
        if($old_image && isset($data['image'])){
            Storage::disk('uploads')->delete($old_image);
        }

        return response()->json([
            'msg' => 'Updated Successfully Data Product',
            'status' => 200,
            'data' => new ProductResource($product)
        ]);
    }

    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'msg' => 'Product not found',
                'status' => 404,
                'data' => null
            ]);
        }
        if($product->image && Storage::disk('uploads')->exists($product->image)){
            Storage::disk('uploads')->delete($product->image);
        }
        $product->delete();
        return response()->json([
            'msg' => 'Deleted Successfully Product',
            'status'=> 200,
            'data'=> null
        ]);

    }
}
