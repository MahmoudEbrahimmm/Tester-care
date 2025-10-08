<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpareResource;
use App\Models\Spare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SparesController extends Controller
{
    public function index()
    {
        $spares = SpareResource::collection(Spare::all());
        $data = [
            'msg' => 'return all devices spare',
            'status' => 200,
            'data' => $spares
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validat = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'device'    => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'cost'      => 'nullable|numeric|min:0',
            'paid'      => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validat->fails()) {
            return response()->json([
                'msg' => 'Validated requird',
                'status' => 205,
                'data' => $validat->errors()
            ]);
        }

        $data = $request->only([
            'name',
            'phone',
            'address',
            'device',
            'description',
            'image',
            'cost',
            'paid',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('spares', 'uploads');
            $data['image'] = $path;
        }

        $spare = Spare::create($data);

        return response()->json([
            'msg' => 'Added Device Successfully',
            'status' => 200,
            'data' => new SpareResource($spare)
        ]);
    }

    public function show(string $id)
    {
        $spare = Spare::find($id);
        if ($spare) {
            $data = [
                'msg' => 'return one device from spare table',
                'status' => 200,
                'data' => new SpareResource($spare)
            ];
            return response()->json($data, 200);
        }
        if (!$spare) {
            $data = [
                'msg' => 'no such id',
                'status' => 404,
                'data' => null
            ];
            return response()->json($data, 404);
        }
    }

    public function update(Request $request, string $id)
    {
                $validat = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'device'    => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'cost'      => 'nullable|numeric|min:0',
            'paid'      => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validat->fails()) {
            return response()->json([
                'msg' => 'Validated requird',
                'status' => 205,
                'data' => $validat->errors()
            ]);
        }

        $spare = Spare::find($id);

        $old_image = $spare->image;

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('spares', 'uploads');
            $data['image'] = $path;
        }

        $spare->update($data);

        if($old_image && isset($data['image'])){
            Storage::disk('uploads')->delete($old_image);
        }

        return response()->json([
            'msg' => 'Updated Data Device Successfully',
            'status' => 200,
            'data' => new SpareResource($spare)
        ]);
    }

    public function destroy(string $id)
    {
        $spare = Spare::find($id);
        if(!$spare){
            $data = [
                'msg' => 'Device not found in spare table',
                'status' => 404,
                'data' => null
            ];
        }
        if($spare->image && Storage::disk('uploads')->exists($spare->image)){
            Storage::disk('uploads')->delete($spare->image);
        }

        $spare->delete();
        return response()->json([
            'msg' => 'Device delted succssfully',
            'status' => 200,
            'data' => null
        ]);
    }
}
