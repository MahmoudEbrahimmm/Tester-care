<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        $data = [
            "msg" => "return all data category table",
            "status" => 200,
            "data" => $categories
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if ($category) {
            $data = [
                'msg' => 'return one record from categories table',
                'status' => 200,
                'data' => $category,
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

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:categories,slug',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg'    => 'Validation required',
                'status' => 205,
                'data'   => $validate->errors(),
            ]);
        }

        $data = $request->only(['name', 'slug', 'parent_id', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'uploads');
        }

        $category = Category::create($data);

        return response()->json([
            'msg'    => 'Created Successfully',
            'status' => 200,
            'data'   => new CategoryResource($category),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'sometimes|required|string|max:255|unique:categories,slug,' . $id,
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('categories', 'uploads');
            $data['image'] = $path;
        }

        $category->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('uploads')->delete($old_image);
        }

        return response()->json([
            'msg'    => 'Updated Successfully',
            'status' => 200,
            'data'   => new CategoryResource($category),
        ]);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'msg' => 'Category not found',
                'status' => 404,
                'data' => null
            ]);
        }

        if ($category->image && Storage::disk('uploads')->exists($category->image)) {
            Storage::disk('uploads')->delete($category->image);
        }

        $category->delete();
        return response()->json([
            'msg' => 'Category deleted successfully',
            'status' => 200,
            'data' => null
        ]);
    }
}
