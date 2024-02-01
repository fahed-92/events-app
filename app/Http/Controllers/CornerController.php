<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Http\Requests\StoreCornerRequest;
use App\Http\Requests\UpdateCornerRequest;

class CornerController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corners = Corner::all();
        return view('admin.corners.index' , compact('corners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCornerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCornerRequest $request)
    {
//        $module_name_plural = $this->getClassNameFromModel();
//        $this->validate($request, [
//            'title_en'=> 'required',
//            'title_ar'=> 'required',
//            'description_en'=> 'required',
//            'description_ar'=> 'required',
//        ]);

//        $data = $request->all();

        $status = Corner::create([
            'name'=>$request->name,
            'no_of_activity'=>$request->no_of_activity
        ]);
        if($status){
            return redirect()->route('admin.corners.index')->with('success', 'تم الإضافة بنجاح');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corner  $corner
     * @return \Illuminate\Http\Response
     */
    public function show(Corner $corner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corner  $corner
     * @return \Illuminate\Http\Response
     */
    public function edit(Corner $corner)
    {
        return view('admin.corners.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCornerRequest  $request
     * @param  \App\Models\Corner  $corner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCornerRequest $request,$id)
    {
        $service = $this->model->findOrFail($id);
            $data = $request->except('id');
            $service->update([
                'name'=>$request->name,
                'description'=>$request->no_of_activity
            ]);
            return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corner  $corner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corner $corner)
    {
        //
    }
}
