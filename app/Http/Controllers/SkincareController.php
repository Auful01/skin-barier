<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use Illuminate\Http\Request;

class SkincareController extends Controller
{
    public function index()
    {
        $data = Skincare::paginate(10);
        return view('pages.admin.skincare', compact('data'));
    }

    public function indexMobile(Request $request)
    {
        if ($request->type != null) {
            # code...
            $data = Skincare::where('type', $request->type)->get();
        }else {
            $data = Skincare::all();
        }

        return response()->json($data);
    }

    public function find($id)
    {
        $data = Skincare::find($id);
        return response()->json($data);
    }

    public function store(Request $request){

        $img_name = null;
        if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $img_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $img_name);
        }

        Skincare::create([
            'name' => $request->name,
            'ingredients' => $request->description,
            'price' => $request->price,
            'image' => $img_name,
            'type' => $request->type,
            'skin_type' => $request->skin_type,
            'suitable' => $request->suitable,
            'key_benefit' => $request->key_benefit,
            'multifunction' => $request->multifunction
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function update(Request $request, $id)
    {
        $data = Skincare::find($id);

        $img_name = $data->image;
        if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $img_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $img_name);
        }

        $data->update([
            'name' => $request->name,
            'ingredients' => $request->description,
            'price' => $request->price,
            'image' => $img_name,
            'type' => $request->type,
            'skin_type' => $request->skin_type,
            'suitable' => $request->suitable,
            'key_benefit' => $request->key_benefit,
            'multifunction' => $request->multifunction
        ]);

        return response()->json(['message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $data = Skincare::find($id);
        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

}
