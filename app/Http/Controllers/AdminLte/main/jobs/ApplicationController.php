<?php

namespace App\Http\Controllers\AdminLte\main\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\accounts\Accounts as AccountsAccounts;
use App\Models\accounts\Like_Articles;
use App\Models\accounts\Like_Groups;
use App\Models\accounts\Like_Mountains;
use App\Models\accounts\Rate_Groups;
use App\Models\accounts\Rate_Mountains;
use App\Models\articles\Articles;
use App\Models\companies\Companies;
use App\Models\emails\Emails;
use App\Models\groups\Groups;
use App\Models\jobs\ApplicationsJob;
use App\Models\location\City;
use App\Models\location\Country;
use App\Models\mountains\Mountains;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        

        $data = [
            'newApplications' => ApplicationsJob::where('deactivated', 0)->orderBy('id', 'DESC')->get(),
            'oldApplications' => ApplicationsJob::where('deactivated', 1)->orderBy('id', 'DESC')->get(),
            'countEs' => ApplicationsJob::whereDate('created', $today)->count(),
            
            'notify'=>Emails::where('status',0)->orderBy('id', 'DESC')->count(),
            'emailNotify'=>Emails::where('status',0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
            
        ];

        return view('AdminLte/main-page/apply/table')->with($data);
    }

    public function messMaker($icon, $mess, $text)
    {
        session()->put('icon', $icon);
        session()->put('mess', $mess);
        session()->put('text', $text);
    }
    public function detail(Request $request)
    {
        $id = $request->get('id');
        $applyJob = ApplicationsJob::find($id);
        $data = [
            'applyJob' => $applyJob,
            'citiesList' => City::get(),
            'companiesList' => Companies::get(),
            'job' => DB::table('jobs')
                ->select('jobs.*', 'cities.name as cityName')
                ->leftJoin('cities', 'jobs.city_id', '=', 'cities.id')
                ->where('jobs.id', $applyJob->job->id)
                ->first(),
            'companyList' => DB::table('jobs_companies')
                ->select('companies.*', 'jobs_companies.job_id')
                ->join('companies', 'jobs_companies.company_id', '=', 'companies.id')
                ->get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        return view('AdminLte/main-page/apply/detail')->with($data);
    }
    public function Read(Request $request)
    {
        $button = $request->get('button');
        if ($button != null) {
            if ($button == 'mask-as-read') {
                $data = [
                    'deactivated' => 1
                ];
                ApplicationsJob::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Mask apply as Read Successfully !', 'apply id "' . $request->get('id') . '" has been mask as Read ');
            } else if ($button == 'mask-as-unread') {
                $data = [
                    'deactivated' => 0
                ];
                ApplicationsJob::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Mask apply as Unread Successfully !', 'apply id "' . $request->get('id') . '" has been mask as Unread ');
            }
        }

        $currentUrl = $request->get('currentUrl');
        if ($currentUrl != null) {

            return redirect($currentUrl);
        }


        return redirect('/admin/apply/table');
    }
}
