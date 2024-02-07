<?php

namespace App\Http\Controllers;

use App\Models\Mascot;
use App\Http\Requests\StoreMascotRequest;
use App\Http\Requests\UpdateMascotRequest;

class MascotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMascotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMascotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascot  $mascot
     * @return \Illuminate\Http\Response
     */
    public function show(Mascot $mascot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascot  $mascot
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascot $mascot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMascotRequest  $request
     * @param  \App\Models\Mascot  $mascot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMascotRequest $request, Mascot $mascot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascot  $mascot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascot $mascot)
    {
        //
    }
}
