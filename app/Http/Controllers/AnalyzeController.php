<?php

namespace App\Http\Controllers;

use App\Models\Analyze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyzeController extends Controller
{
    //

    public function index()
    {
        $data = Analyze::paginate(10);
        return view('pages.admin.analyze', compact('data'));
    }

    public function indexMobile()
    {
        $data = Analyze::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $meanDataTotal = Analyze::where('user_id', Auth::user()->id)->avg('result');

        $retData = [
            'data' => $data,
            'mean' => $meanDataTotal
        ];
        return response()->json($retData);
    }


    public function store(Request $request)
    {
        $img_name = null;
        if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/analyzes');
            $image->move($destinationPath, $img_name);
        }

        Analyze::create([
            'user_id' => Auth::user()->id,
            'image' => $img_name,
            'result' => $request->result
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function find($id)
    {
        $data = Analyze::find($id);
        return response()->json($data);
    }



}
