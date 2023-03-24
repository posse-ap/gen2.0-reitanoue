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
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use \Symfony\Component\HttpFoundation\Response;

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
        return view('index', compact('today', 'month', 'total', 'bars', 'languages', 'contents', 'language_titles', 'content_titles', 'today_study_records', 'user'));
    }


    public function form(Request $request)
    {
        $user_id = Auth::id();
        StudyHoursReport::create(
            [
                'user_id' => $user_id,
                'study_hour' => $request->study_hour,
                'study_date' => $request->study_date,
                'language_id' => $request->language,
                'content_id' => $request->content
            ]
        );
        return redirect('/top');
    }



    // 一覧取得用
    public function news()
    {
        $client = new Client([
            'base_uri' => 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/',
        ]);

        $method = 'GET';
        $uri = 'news';   
        $options = []; //第３引数必要
        $response = $client->request($method, $uri, $options);

        $lists = json_decode($response->getBody()->getContents(), true);

        return view('news.news',compact('lists'));
    }

    // id使って呼びだす用
    public function getNews($id)
    {
        $client = new Client([
            'base_uri' => 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news/',
        ]);


        $method = 'GET';
        $uri = $id;
        // dd($uri);
        $options=[
            'query' => [
                'id' => $id,
            ],
        ];
        $response = $client->request($method, $uri, $options);

        $news = json_decode($response->getBody()->getContents(), true);

        // dd($news);

        return view('news.article',compact('news'));

        // return view('news.')
    }
}
