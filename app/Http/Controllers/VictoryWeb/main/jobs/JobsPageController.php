<?php

namespace App\Http\Controllers\VictoryWeb\main\jobs;

use App\Http\Controllers\Controller;


use App\Models\mountains\Mountains;
use App\Models\mountains\Mountains_photo;
use App\Models\mountains\Mountains_video;
use App\Models\accounts\Accounts;
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
use App\Models\accounts\Rate_Mountains;
use App\Models\accounts\Rate_Groups;


use App\Models\accounts\Like_Groups;
use App\Models\accounts\Like_Jobs;
use App\Models\accounts\Rate_Jobs;
use App\Models\cvs\UserCvs;
use App\Models\jobs\ApplicationsJob;
use App\Models\jobs\Jobs;
use Illuminate\Http\Request;

class JobsPageController extends Controller
{
    public function index()
    {
        $jobsLikeList = null;
        if (session()->has('user')) {
            $jobsLikeList = Like_Jobs::where('user_id', session()->get('user')->id)->get();
        }

        $scoreList = DB::table('rates_jobs')
            ->select('job_id', DB::raw('
            CASE
                WHEN AVG(rate_score) - FLOOR(AVG(rate_score)) > 0.5 THEN CEILING(AVG(rate_score))
                ELSE FLOOR(AVG(rate_score))
            END AS avg_score
        '))
            ->groupBy('job_id')
            ->get();

        $topRates = DB::table('rates_jobs')
            ->select('job_id', 'jobs.id', 'jobs.name', 'jobs.photo', DB::raw('
            CASE
                WHEN AVG(rate_score) - FLOOR(AVG(rate_score)) > 0.5 THEN CEILING(AVG(rate_score))
                ELSE FLOOR(AVG(rate_score))
            END AS avg_score
        '))
            ->join('jobs', 'jobs.id', '=', 'rates_jobs.job_id')
            ->groupBy('job_id', 'jobs.id', 'jobs.name', 'jobs.photo')
            ->orderBy('avg_score', 'DESC')
            ->limit(10)
            ->get();


        $data = [
            'cityList' => City::get(),
            'jobsList' => DB::table('jobs')
                ->select('jobs.*', 'cities.name as city_name')
                ->leftjoin('cities', 'cities.id', '=', 'jobs.city_id')
                ->where('deactivated', 0)->get(),
            'jobsLikeList' => $jobsLikeList,
            'scoreList' => $scoreList,
            'topRates' => $topRates,
            'jobsCount' => Jobs::where('deactivated', 0)->count(),
            'jobsAlllike' => Like_Jobs::count()
        ];


        return view('VictoryWeb/main-page/jobs-page/index')->with($data);
    }
    public function detail(Request $request)
    {
        $id = $request->get('id');
        $userId = session()->get('user')->id;
        $user_cvs = UserCvs::where('user_id', $userId)->get();
        // dd($user_cvs);

        $commentList = DB::table('comments')
            ->select('comments.*', 'user.fullname', 'user.photo', 'user.id')
            ->join('user', 'user.id', '=', 'comments.user_id')
            ->where('job_id', $id)
            ->orderBy('created', 'DESC')
            ->get();

        $scoreList = DB::table('rates_jobs')
            ->select('job_id', DB::raw('
            CASE
                WHEN AVG(rate_score) - FLOOR(AVG(rate_score)) > 0.5 THEN CEILING(AVG(rate_score))
                ELSE FLOOR(AVG(rate_score))
            END AS avg_score
        '))
            ->where('job_id', $id)
            ->groupBy('job_id')
            ->first();

        if ($id == null) {
            return redirect('/blogs');
        }
        $job = Jobs::where('id', $id)->where('deactivated', 0)->first();
        if ($job == null) {
            return redirect('/jobs');
        }
        $jobsLikeList = null;
        if (session()->has('user')) {
            $jobsLikeList = Like_Jobs::where('user_id', session()->get('user')->id)->get();
        }
        $score = null;
        if (session()->has('user')) {
            $score = Rate_Jobs::where('user_id', session()->get('user')->id)->where('job_id', $id)->first();
        }

        $companiesList = DB::table('companies')
            ->join('jobs_companies', 'companies.id', '=', 'jobs_companies.company_id')
            ->select('companies.id', 'companies.name', 'companies.photo_main')
            ->where('jobs_companies.job_id', $id)
            ->where('deactivated', 0)
            ->groupBy('companies.id', 'companies.name', 'companies.photo_main')
            ->get();


        $data = [
            'job' => $job,
            'user_cvs' => $user_cvs,
            'companiesList' => $companiesList,
            'jobsLikeList' => $jobsLikeList,
            'score' => $score,
            'scoreList' => $scoreList,
            'commentList' => $commentList
        ];
        return view('VictoryWeb/main-page/jobs-page/detail')->with($data);
    }
    public function searchJobs(Request $request)
    {
        $checkedLocations = $request->input('checkedLocations');
        $jobsList = DB::table('jobs')
            ->select('jobs.*', 'cities.name as city_name')
            ->leftjoin('cities', 'cities.id', '=', 'jobs.city_id')
            ->where('deactivated', 0)->get();
        if ($checkedLocations != null) {
            $jobsList = DB::table('jobs')
                ->select('jobs.*', 'cities.name as city_name')
                ->leftjoin('cities', 'cities.id', '=', 'jobs.city_id')
                ->whereIn('city_id', $checkedLocations)
                ->where('deactivated', 0)->get();
        }

        $scoreList = DB::table('rates_jobs')
            ->select('job_id', DB::raw('
            CASE
                WHEN AVG(rate_score) - FLOOR(AVG(rate_score)) > 0.5 THEN CEILING(AVG(rate_score))
                ELSE FLOOR(AVG(rate_score))
            END AS avg_score
        '))
            ->groupBy('job_id')
            ->get();

        $jobsLikeList = null;
        if (session()->has('user')) {
            $jobsLikeList = Like_Jobs::where('user_id', session()->get('user')->id)->get();
        }

        return response()->json(array(
            'jobsList' => $jobsList,
            'jobsLikeList' => $jobsLikeList,
            'scoreList' => $scoreList
        ), 200);
    }
    public function apply(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_cv_id' => 'required|exists:user_cvs,id', // Giả sử có bảng user_cvs
        ]);

        ApplicationsJob::create([
            'user_id' => session()->get('user')->id,
            'job_id' => $request->job_id,
            'user_cv_id' => $request->user_cv_id,
            'deactivated' => false,
        ]);

        return redirect()->back()->with('success', 'Ứng tuyển thành công!');
    }
}
