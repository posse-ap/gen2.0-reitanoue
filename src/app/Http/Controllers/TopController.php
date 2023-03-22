<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Content;
use App\Models\Language;
use App\Models\StudyHoursReport;

class TopController extends Controller
{
    //
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

        $bars = StudyHoursReport::select(DB::raw('SUM(study_hour) AS sum_hour'), 'study_date')->groupBy('study_date')->havingRaw(" DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')")->get();
        $languages = StudyHoursReport::join('languages', 'languages.id', '=', 'study_hours_reports.language_id')
            ->select('languages.language', 'languages.color', DB::raw('SUM(study_hours_reports.study_hour) AS sum_hour'))
            ->whereRaw(" DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')")
            ->groupBy('languages.language', 'languages.color')
            ->get();
        $contents = StudyHoursReport::join('contents', 'contents.id', '=', 'study_hours_reports.content_id')
            ->select('contents.content', 'contents.color', DB::raw('SUM(study_hours_reports.study_hour) AS sum_hour'))
            ->whereRaw(" DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')")
            ->groupBy('contents.content', 'contents.color')
            ->get();

            $language_titles = Language::all();
            $content_titles = Content::all();
            $today_study_records = StudyHoursReport::join('languages', 'languages.id', '=', 'study_hours_reports.language_id')->join('contents', 'contents.id', '=', 'study_hours_reports.content_id')->whereDate('study_date', date('Y-m-d'))->get();
    
            // 現在認証しているユーザーを取得
            $user = Auth::user();
            return view('index', compact('today', 'month', 'total', 'bars', 'languages', 'contents', 'language_titles', 'content_titles','today_study_records','user'));
        }
    
    
        public function form(Request $request){
            $user_id=Auth::id();
            StudyHoursReport::create(
                [
                    'user_id' => $user_id,
                    'study_hour' =>$request->study_hour,
                    'study_date' =>$request->study_date,
                    'language_id' =>$request->language,
                    'content_id' =>$request->content
                ]
                );
            return redirect('/home');
            }
    
        
    }
