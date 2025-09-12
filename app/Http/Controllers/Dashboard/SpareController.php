<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Spare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spares = Spare::paginate();
        return view('dashboard.spares.index', compact('spares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.spares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'device'    => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'cost'      => 'nullable|numeric|min:0',
            'paid'      => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/spares', 'public');
            $data['image'] = $path;
        }

        $data = Spare::create($data);

        return redirect()->route('dashboard.spares.index')
            ->with('success', 'تم اضافة الجهاز بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spares = Spare::findOrFail($id);
        return view('dashboard.spares.show', ["spare" => $spares]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spare $spare)
    {
        return view('dashboard.spares.edit', compact('spare'));
    }

    public function update(Request $request, Spare $spare)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'device'     => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'cost'       => 'nullable|numeric|min:0',
            'paid'       => 'nullable|numeric|min:0',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

         $old_image = $spare->image;

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('uploads/spares', 'public');
        $data['image'] = $path;
    }

    $spare->update($data);

    if ($old_image && isset($data['image'])) {
        Storage::disk('public')->delete($old_image);
    }


        return redirect()->route('dashboard.spares.index')
            ->with('success', 'تم تعديل بيانات الجهاز بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spare = Spare::findOrFail($id);
        $spare->delete();

        return redirect()->route('dashboard.spares.index')
        ->with('success','تم حذف الجهاز بنجاح');
    }
}
