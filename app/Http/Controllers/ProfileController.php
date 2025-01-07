<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index()
    {
       $data = Profile::with('user')->where('user_id', auth()->user()->id)->first();
    //    dd($data);
    //    return view('pages.mobile.profile', compact('data'));
        return response()->json($data);
    }

    // public function edit(){
    //     $data = Profile::with('user')->where('user_id', auth()->user()->id)->get();
    //     return view('pages.mobile.edit-profile', compact('data'));
    // }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (Profile::where('user_id', auth()->user()->id)->exists()) {
            // return response()->json(['message' => 'Data sudah ada']);
            Profile::where('user_id', auth()->user()->id)->update([
                'skin_type' => $request->skin_type,
                'age' => $request->age,
                'gender' => $request->gender
            ]);


        }else {
            Profile::create([
                'user_id' => auth()->user()->id,
                'skin_type' => $request->skin_type,
                'age' => $request->age,
                'gender' => $request->gender
            ]);
        }

        User::where('id', auth()->user()->id)->update([
            'name' => $request->name ?? $user->name,
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

}
