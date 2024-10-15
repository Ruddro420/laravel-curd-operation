<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserData::paginate(2);
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $data = new UserData();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UserData::find($id);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = UserData::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UserData::find($id);
        $data->delete();
        return redirect()->route('user');
    }

}
