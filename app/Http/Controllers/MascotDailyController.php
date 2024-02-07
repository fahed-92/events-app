<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyInfoRequest;

//use App\Http\Requests\UpdateDailyInfoRequest;
use App\Models\Corner;
use App\Models\DailyInfo;
use App\Models\MascotDaily;
use App\Http\Requests\StoreMascotDailyRequest;
use App\Http\Requests\UpdateMascotDailyRequest;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request;

class MascotDailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() != 'Mascot Team') {
            $corner = Corner::where('name', Auth()->user()->name)->first();
            $dailyInfos = MascotDaily::where('corner_id', $corner->id)->orderBy('created_at', 'desc')->paginate(7);
            return view('dailyForm', compact('corner', 'dailyInfos'));
        } else if (Auth::user() == 'Mascot Team') {
            $corner = Corner::where('name', Auth()->user()->name)->first();
            $dailyInfos = MascotDaily::where('corner_id', $corner->id)->orderBy('created_at', 'desc')->paginate(7);
            return view('dailyForm', compact('corner', 'dailyInfos'));
        }
        return view('auth.login');
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $shows = [];
            $show1 = (object)['name' => $request->first_show_name,
                'kids' => $request->first_show_kids,
                'time' => $request->time,
            ];
            $show2 = (object)['name' => $request->second_show_name,
                'kids' => $request->second_show_kids,
                'time' => $request->time,
            ];
            $show3 = (object)['name' => $request->third_show_name,
                'kids' => $request->third_show_kids,
                'time' => $request->time,
            ];
            $show4 = (object)['name' => $request->fourth_show_name,
                'kids' => $request->fourth_show_kids,
                'time' => $request->time,
            ];
            $show5 = (object)['name' => $request->fifth_show_name,
                'kids' => $request->fifth_show_kids,
                'time' => $request->time,
            ];
            $shows = [$show1, $show2, $show3, $show4, $show5];


//            $request->validated();
//            return $request;
            $duplicate = MascotDaily::where('corner_id', $request->corner)->where('date', $request->date)->first();

            if ($duplicate === null) {
                $data = MascotDaily::create([
                    'corner_id' => $request->corner,
                    'no_supervisors' => $request->no_supervisors,
                    'no_performers' => $request->no_performers,
                    'no_extra_performers' => $request->no_extra_performers,
                    'no_wardrobe' => $request->no_wardrobe,
                    'comments' => $request->comments,
                    'photos_link' => $request->linkForPhotosAndVideos,
                    'date' => $request->date,
                ]);
                foreach ($shows as $show) {
                    Show::create([
                        'name' => $show->name,
                        'no_kids' => $show->kids,
                        'date' => $request->date,
                        'mascot_daily_id' => $data->id,
                        'time' => $show->time,
                    ]);
                }
            } else {
                return response(['date' => 'The combination of date and corner  already exists.']);
            }
            $corner = Corner::where('id', $request->corner)->first();
            return view('partials.mascots-daily-row', compact('data', 'corner'));

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
    public
    function show(DailyInfo $dailyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public
    function edit(DailyInfo $dailyInfo)
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
    public
    function update(UpdateDailyInfoRequest $request, DailyInfo $dailyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DailyInfo $dailyInfo
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(DailyInfo $dailyInfo)
    {
        //
    }
}
