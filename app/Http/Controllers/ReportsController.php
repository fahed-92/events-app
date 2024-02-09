<?php

namespace App\Http\Controllers;

use App\Models\Att;
use App\Models\DailyInfo;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /** Daily Reports **/
    public function index(Request $request)
    {
        $date = $request->date;
        return view('admin.reports.index', compact('date'));
    }

    public function dailyReport(Request $request)
    {
        try {
            $dailyInfoReports = DB::table('daily_infos')
                ->leftjoin('corners', 'daily_infos.corner_id', '=', 'corners.id')
                ->where('daily_infos.date', $request->date)
                ->select([
                    'corners.name as corner_id', 'daily_infos.no_Kids', 'daily_infos.no_staff', 'daily_infos.liked_activity', 'daily_infos.photos_link'
                ])->get();
            $allDaily = DailyInfo::select('date')->get();
            $collection = collect($allDaily);
            $unique = $collection->unique();

            $date = $request->date;
            $startDate = Carbon::parse('2023-12-22');
            $endDate = Carbon::parse($date);


            $dayCount = $endDate->diffInDays($startDate);
            return view('admin.reports.dailyReports', compact('dailyInfoReports', 'date', 'dayCount'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function pdf($date)
    {
        $dailyInfoReports = DB::table('daily_infos')
            ->leftjoin('corners', 'daily_infos.corner_id', '=', 'corners.id')
            ->where('daily_infos.date', $date)
            ->select([
                'corners.name as corner_id', 'daily_infos.no_Kids', 'daily_infos.no_staff', 'daily_infos.liked_activity', 'daily_infos.photos_link'
            ])->get();
        $allDaily = DailyInfo::select('date')->get();
        $collection = collect($allDaily);
        $unique = $collection->unique();

        $startDate = Carbon::parse('2023-12-22');
        $endDate = Carbon::parse($date);


        $dayCount = $endDate->diffInDays($startDate);
        foreach ($dailyInfoReports as $dailyInfoReport) {
            $data [] = [
                'corner_id' => $dailyInfoReport->corner_id,
                'no_Kids' => $dailyInfoReport->no_Kids,
                'no_staff' => $dailyInfoReport->no_staff,
                'liked_activity' => $dailyInfoReport->liked_activity,
                'photos_link' => $dailyInfoReport->photos_link,
            ];
        }
//         $data;

        $pdf = PDF::loadView('admin.reports.pdf', [
            'data' => $data,
            'dayCount' => $dayCount,
            'date' => $date,
        ]);

        return $pdf->download('admin.reports.pdf');
    }

    /** HR Reports **/
    public function indexHr(Request $request)
    {
        $date = $request->date;
        $staff = Staff::get();
        return view('admin.reports.hr.attendance.index', compact('staff'));
    }

    public function hrReport(Request $request)
    {
        try {
            $hrReports = DB::table('atts')
                ->leftjoin('staff', 'atts.staff_id', '=', 'staff.id')
                ->where('atts.staff_id', $request->staff)
                ->select([
                    'staff.full_name as staff_id', 'atts.date', 'atts.status', 'atts.check_in', 'atts.check_out'
                ])
                ->paginate(7);
            $allDaily = Att::select('date')->get();
            $collection = collect($allDaily);
            $unique = $collection->unique();

            $date = $request->date;
            $dayCount = $unique->count();

            return view('admin.reports.hr.attendance.partials.data-row', compact('hrReports', 'date', 'dayCount'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function hrPdf($date)
    {
        $hrReports = DB::table('atts')
            ->leftjoin('staff', 'atts.staff_id', '=', 'staff.id')
            ->where('atts.date', $date)
            ->select([
                'staff.full_name as staff_id', 'atts.date', 'atts.status', 'atts.check_id', 'atts.check_out'
            ])->get();
        $allDaily = Att::select('date')->get();
        $collection = collect($allDaily);
        $unique = $collection->unique();
        $dayCount = $unique->count();
        foreach ($hrReports as $hrReport) {
            $data [] = [
                'date' => $hrReport->date,
                'staff_id' => $hrReport->staff_id,
                'status' => $hrReport->status,
                'check_in' => $hrReport->check_in,
                'check_out' => $hrReport->check_out,
            ];
        }
        $pdf = PDF::loadView('admin.hr.reports.pdf', [
            'data' => $data,
            'dayCount' => $dayCount,
            'date' => $date,
        ]);
        return $pdf->download($date);
    }

    public function getDropdownValues()
    {
        $dropdownValues = Staff::pluck('full_name', 'id');
        return response()->json($dropdownValues);
    }

    public function searchDropdown(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $results = Staff::where('full_name', 'like', "%$searchTerm%")->pluck('full_name', 'id');

        return response()->json($results);
    }


}
