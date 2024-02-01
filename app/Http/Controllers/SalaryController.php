<?php

namespace App\Http\Controllers;

use App\Models\Att;
use App\Models\Staff;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.hr.salariesReport');
    }
    public function get()
    {
        $data = Staff::get();
        foreach ($data as $person) {
            $person->setAttribute('absent_count', $this->absent_count($person->id));
            $person->setAttribute('present_count', $this->present_count($person->id));
        }
        return response()->json($data);
    }


    public function absent_count($id)
    {
        $staff = Att::where('staff_id' , $id)->where('status' , 'absent')->get();
        return $absent_count = $staff->count();
    }

    public function present_count($id)
    {
        $staff = Att::where('staff_id' , $id)->where('status' ,'!=', 'absent' )->get();
        return $staff->count();
    }

}
