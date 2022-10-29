<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudyHoursReport;
use App\Models\Language;
use App\Models\Content;
//ここにモデルを書く

class TopController extends Controller
{
    /**
     * 指定ユーザーのプロファイルを表示
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $today = StudyHoursReport::whereDate('study_date', date('Y-m-d'))->sum('study_hour');
        $month = StudyHoursReport::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_hour');
        $total = StudyHoursReport::sum('study_hour');

        $bars = StudyHoursReport::select(DB::raw('SUM(study_hour) AS sum_hour') , 'study_date')->groupBy('study_date')->havingRaw(" DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')")->get();
        // $languages = Language::all();
        $languages = StudyHoursReport::join('languages', 'languages.id', '=', 'study_hours_reports.language_id')
            ->select('languages.language','languages.color',DB::raw('SUM(study_hours_reports.study_hour) AS sum_hour'))
            ->whereRaw(" DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')")
            ->groupBy('languages.language','languages.color')
            ->get();
        $contents = Content::all();
        // dd($languages);
        return view('index', compact('today','month','total','bars','languages','contents'));

    }

}