<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    //

    public function index()
    {
        $data = Solution::paginate(10);
        return view('pages.admin.solution', compact('data'));
    }

    public function indexMobile(Request $request)
    {
        $data = Solution::where('infection_rate', '<=', $request->result)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        Solution::create([
            'infection_rate' => $request->infection_rate,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function find($id)
    {
        $data = Solution::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Solution::find($id);
        $data->update([
            'infection_rate' => $request->infection_rate,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $data = Solution::find($id);
        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
