<?php

namespace App\Http\Controllers\VictoryWeb\main\companies;

use App\Http\Controllers\Controller;


use App\Models\mountains\Mountains;
use App\Models\mountains\Mountains_photo;
use App\Models\mountains\Mountains_video;
use App\Models\accounts\Accounts;
use App\Models\accounts\Like_Companies;
use App\Models\articles\Articles;
use App\Models\articles\Categories;
use App\Models\articles\Article_category;
use App\Models\articles\Article_mountain;
use App\Models\groups\Groups;
use App\Models\groups\Group_mountain;
use App\Models\location\City;
use App\Models\location\Country_mountain;
use App\Models\location\Country;
use Illuminate\Support\Facades\DB;
use App\Models\accounts\Like_Mountains;
use App\Models\accounts\Like_Groups;
use App\Models\accounts\Rate_Companies;
use App\Models\accounts\Rate_Mountains;
use App\Models\accounts\Rate_Groups;
use App\Models\companies\Companies;
use App\Models\companies\Companies_photo;
use App\Models\companies\Companies_video;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CompaniesPageController extends Controller
{
    public function index()
    {

        $companiesLikeList = null;
        if (session()->has('user')) {
            $companiesLikeList = Like_Companies::where('user_id', session()->get('user')->id)->get();
        }
        $data = [
            'companiesList' => Companies::where('deactivated', 0)->paginate(12),
            'countryList' => DB::table('country_companies')
                ->select('countries.id', 'countries.name')
                ->join('countries', 'countries.id', '=', 'country_companies.country_id')
                ->groupBy('countries.id', 'countries.name')
                ->get(),
            'articleList' => DB::table('article')
                ->join('article_companies', 'article_companies.article_id', '=', 'article.id')
                ->select('article.*')
                ->where('deactivated', 0)
                ->groupBy('article.id', 'article.name', 'article.photo', 'article.description', 'article.created', 'article.deactivated')
                ->inRandomOrder()
                ->limit(15)
                ->get(),
            'companiesLikeList' => $companiesLikeList,
            'companiesAlllike' => Like_Companies::count(),
            'companiesCount' => Companies::where('deactivated', 0)->count()
        ];

        return view('VictoryWeb/main-page/companies-page/index')->with($data);
    }
    public function detail(Request $request)
    {
        $id = $request->get('id');

        $commentList = DB::table('comments')
            ->select('comments.*', 'user.fullname', 'user.photo', 'user.id')
            ->join('user', 'user.id', '=', 'comments.user_id')
            ->where('company_id', $id)
            ->orderBy('created', 'DESC')
            ->get();

        $jobsLikeList = null;
        if (session()->has('user')) {
            $jobsLikeList = Like_Companies::where('user_id', session()->get('user')->id)->get();
        }

        $scoreList = DB::table('rates_companies')
            ->select('company_id', DB::raw('
            CASE
                WHEN AVG(rate_score) - FLOOR(AVG(rate_score)) > 0.5 THEN CEILING(AVG(rate_score))
                ELSE FLOOR(AVG(rate_score))
            END AS avg_score
        '))
            ->where('company_id', $id)
            ->groupBy('company_id')
            ->first();

        if ($id == null) {
            return redirect('/companies');
        }

        $company = Companies::where('id', $id)->where('deactivated', 0)->first();
        if ($company == null) {
            return redirect('/companies');
        }

        $companiesLikeList = null;
        if (session()->has('user')) {
            $companiesLikeList = Like_Companies::where('user_id', session()->get('user')->id)->get();
        }

        $score = null;
        if (session()->has('user')) {
            $score = Rate_Companies::where('user_id', session()->get('user')->id)->where('company_id', $id)->first();
        }
        $data = [
            'company' => $company,
            'photoList' => Companies_photo::where('company_id', $id)->get(),
            'videoList' => Companies_video::where('company_id', $id)->get(),
            'articleList' => DB::table('article_companies')
                ->select('*')
                ->join('article', 'article.id', '=', 'article_companies.article_id')
                ->where('article_companies.company_id', $id)
                ->limit(10)
                ->get(),
            'jobsList' => DB::table('jobs_companies')
                ->select('*')
                ->join('jobs', 'jobs.id', '=', 'jobs_companies.job_id')
                ->where('jobs_companies.company_id', $id)
                ->limit(10)
                ->get(),
            'companiesLikeList' => $companiesLikeList,
            'score' => $score,
            'scoreList' => $scoreList,
            'jobsLikeList' => $jobsLikeList,
            'commentList' => $commentList

        ];
        return view('VictoryWeb/main-page/companies-page/detail')->with($data);
    }

    public function searchCompanies(Request $request)
    {
        $checkedLocations = $request->input('checkedLocations');
        $companiesList = Companies::where('deactivated', 0)->get();
        if ($checkedLocations != null) {
            $companiesList = DB::table('companies')
                ->select('companies.id', 'companies.name', 'companies.photo_main', 'companies.photo_background')
                ->join('country_companies', 'companies.id', '=', 'country_companies.company_id')
                ->join('countries', 'country_companies.country_id', '=', 'countries.id')
                ->where('companies.deactivated', 0)
                ->whereIn('countries.id', $checkedLocations)
                ->groupBy('companies.id', 'companies.name', 'companies.photo_main', 'companies.photo_background')
                ->get();
        }
        $companiesLikeList = null;
        if (session()->has('user')) {
            $companiesLikeList = Like_Companies::where('user_id', session()->get('user')->id)->get();
        }
        //session()->put('mountainSearchList');

        return response()->json(array(
            'companiesList' => $companiesList,
            'companiesLikeList' => $companiesLikeList
        ), 200);
    }
    public function searchCompaniesByKeyword(Request $request)
    {
        $query = $request->get('query');
        
        $companiesList = Companies::where('name', 'LIKE', "%{$query}%")
        ->where('deactivated', 0)
        ->get();
        $companiesLikeList = []; // Lấy danh sách các công ty được người dùng thích nếu cần

        return response()->json([
            'companiesList' => $companiesList,
            'companiesLikeList' => $companiesLikeList
        ]);
    }
}
