<?php

namespace App\Http\Controllers;

use App\Models\Att;
use App\Http\Requests\StoreAttRequest;
use App\Http\Requests\UpdateAttRequest;
use App\Models\Corner;
use App\Models\Staff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()) {
            $corner = Corner::where('name', Auth()->user()->name)->with('staff')->first();
            $atts = $this->attByStaff($corner->id);
            return view('attendance', compact('corner', 'atts'));
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAttRequest $request
     * @return Application|Factory|View|Response
     */
    public function store(StoreAttRequest $request)
    {
        try {
            DB::beginTransaction();
            $staff=$request->staff;
            $data = [] ;
            foreach ($staff as $person) {
                $dublicate = Att::where('staff_id' , $person->id)->where('date' , $request->date)->first();
                if ($dublicate === null ) {
                    if ($request->status == 'absent' || $request->status == 'off') {
                        $data [] = Att::create([
                            'staff_id' => $person,
                            'check_in' => '00:00:00',
                            'check_out' => '00:00:00',
                            'date' => $request->date,
                            'status' => $request->status,
                        ]);
                    } else {
                        $data [] = Att::create([
                            'staff_id' => $person,
                            'check_in' => $request->checkIn,
                            'check_out' => $request->checkOut,
                            'date' => $request->date,
                            'status' => $request->status
                        ]);
                    }
                }else{

                    return 'Date and staff Duplicated';
                }

            }
            DB::commit();
            $corner = Corner::where('id', $request->corner)->select('corners.name')->first();
            $staff_response = [];
            foreach ( $staff as $person) {
                $staff_response[] =  Staff::where('id', $person)->select('staff.full_name')->get();

            }
            return view('partials.data-row-att', compact('data', 'corner', 'staff_response'));
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this-> $ex->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Att $att
     * @return Response
     */
    public function show(Att $att)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Att $att
     * @return Response
     */
    public function edit(Att $att)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAttRequest $request
     * @param \App\Models\Att $att
     * @return Response
     */
    public function update(UpdateAttRequest $request, Att $att)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Att $att
     * @return Response
     */
    public function destroy(Att $att)
    {
        //
    }

    /**
     * Return Att For each staff in corner.
     *
     * @return Response
     */
    public function attByStaff($corner_id)
    {
        return DB::table('atts')
            ->leftjoin('staff', 'atts.staff_id', '=', 'staff.id')
            ->where('staff.corner_id' , '=' , $corner_id)
            ->select([
                'staff.full_name as staff_id', 'atts.check_in', 'atts.check_out', 'atts.date', 'atts.created_at'
            ])->orderBy('created_at', 'desc')->paginate(7);
    }

}
