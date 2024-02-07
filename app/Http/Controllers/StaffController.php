<?php

namespace App\Http\Controllers;

use App\Imports\ImportStaff;
use App\Models\Att;
use App\Models\Corner;
use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
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
        return view('admin.staff.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorestaffRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestaffRequest $request)
    {


        $status = Staff::create([
            'full_name' => $request->full_name,
            'corner_id' => 1,
//            'cv'=>$this->upload('CVs',$request->cv),
//            'noc'=>$this->upload('NOCs',$request->noc),
//            'id_pic'=>$this->upload('IDs',$request->id_pic),
            'salary' => $request->salary,
            'date_of_joining' => $request->date_of_joining,
        ]);
        if ($status) {
            return redirect()->route('admin.staff.index')->with('success', 'تم الإضافة بنجاح');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $row = $staff->findOrFail($staff->id);
        $corner = Corner::where('id' , $row->corner_id)->first();
        $corners=Corner::all();
        return view('admin.staff.edit' , compact('row' , 'corner','corners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStaffRequest $request
     * @param \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        $service = $this->model->findOrFail($id);
        $data = $request->except('id');
        $service->update([
            'full_name' => $request->full_name,
            'corner_id' => $request->corner_id,
            'cv' => $this->upload('CVs', $request->cv),
            'noc' => $this->upload('NOCs', $request->noc),
            'id_pic' => $this->upload('IDs', $request->id_pic),
            'salary' => $request->salary,
            'date_of_joining' => $request->date_of_joining,
        ]);
        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }

    public function upload($folderName, $image)
    {
        $folder = public_path('admin/assets/images/' . $folderName . '/');
        $filename = time() . '.' . $image->getClientOriginalName();
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);
        }
        $image->move($folder, $filename);
        return $filename;
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new ImportStaff(), $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }



}
