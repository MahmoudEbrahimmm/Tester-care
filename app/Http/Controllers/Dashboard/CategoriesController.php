<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->paginate(8);
        
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view('dashboard.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);


        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('categories/', 'uploads');
            $data['image'] = $path;
        }

        $category = Category::create($data);
        //PRG
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم انشاء القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', ["item" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parents = Category::all();
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('parents', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('categories/', 'uploads');
            $data['image'] = $path;
        }

        $category->update($data);
        if ($old_image && isset($data['image'])) {
            Storage::disk('uploads')->delete($old_image);
        }
        return redirect()->route('dashboard.categories.index')
            ->with('success', '!تم تحديث بيانات القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.categories.index')
        ->with('success','تم حذ القسم بنجاح');
    }
}
