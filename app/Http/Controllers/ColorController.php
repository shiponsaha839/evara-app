<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.color.index', ['colors' => Color::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'code'          => 'required',
        ], [
            'name.required'  => 'Color name field is required',
            'code.required'         => 'Color Code field is required',
        ]);

        Color::newColor($request);
        return back()->with('message', 'Color info create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',['colors' =>$color]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        Color::updateColor($request, $color);
        return redirect('/color')->with('message', 'Color info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
    Color::deleteColor($color);
    return back()->with('message','Color Info delete Successfully.');
    }

}
