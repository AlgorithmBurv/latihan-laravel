<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // luzzy loading
        // $class = classRoom::all();
        // // dd('$student');
        // return view('classRoom', ['classList' => $class]);

        //eager loading
        $class = classRoom::with('student')->get();
        return view('classRoom', ['classList' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(classRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(classRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(classRoom $classRoom)
    {
        //
    }
}
