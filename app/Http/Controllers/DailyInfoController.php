<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\DailyInfo;
use App\Http\Requests\StoreDailyInfoRequest;
use App\Http\Requests\UpdateDailyInfoRequest;
use App\Models\MascotDaily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DailyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return Auth::user();
        if(Auth::user()){

            if (Auth()->user()->name != 'Mascot Team') {
                $corner = Corner::where('corners.name', Auth()->user()->name)->first();
                $dailyInfos = DailyInfo::where('corner_id', $corner->id)->orderBy('created_at', 'desc')->paginate(7);
                return view('dailyForm', compact('corner', 'dailyInfos'));
            }else {
                $corner = Corner::where('corners.name', Auth()->user()->name)->first();
                $dailyInfos = MascotDaily::where('corner_id', $corner->id)->orderBy('created_at', 'desc')->paginate(7);
                if (!$dailyInfos){
                    return 0;
                }
                return view('mascotDailyForm', compact('corner', 'dailyInfos'));
            }
        } else {
            return view('auth.login');
        }
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
     * @param \App\Http\Requests\StoreDailyInfoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyInfoRequest $request)
    {
        try {
            $request->validated();
            $duplicate = DailyInfo::where('daily_infos.corner_id', $request->corner)->where('daily_infos.date', $request->date)->first();

            if ($duplicate === null) {
                $data = DailyInfo::create([
                    'corner_id' => $request->corner,
                    'no_Kids' => $request->numberOfKids,
                    'no_staff' => $request->numberOfStaff,
                    'daily_maintenance' => $request->daily_maintenance,
                    'liked_activity' => $request->mostLikedActivity,
                    'photos_link' => $request->linkForPhotosAndVideos,
                    'date' => $request->date,
                ]);
            } else {
                return response(['date' => 'The combination of date and corner  already exists.']);
            }
            $corner = Corner::where('id', $request->corner)->first();
            return view('partials.data-row', compact('data', 'corner'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DailyInfo $dailyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyInfo $dailyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDailyInfoRequest $request
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyInfoRequest $request, DailyInfo $dailyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyInfo $dailyInfo)
    {
        //
    }
}
