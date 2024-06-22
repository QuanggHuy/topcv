<?php
namespace App\Http\Controllers\AdminLte\main\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\accounts\Accounts as AccountsAccounts;
use App\Models\accounts\Like_Articles;
use App\Models\accounts\Like_Companies;
use App\Models\accounts\Like_Groups;
use App\Models\accounts\Like_Jobs;
use App\Models\accounts\Like_Mountains;
use App\Models\accounts\Rate_Companies;
use App\Models\accounts\Rate_Groups;
use App\Models\accounts\Rate_Jobs;
use App\Models\accounts\Rate_Mountains;
use App\Models\articles\Articles;
use App\Models\companies\Companies;
use App\Models\emails\Emails;
use App\Models\groups\Groups;
use App\Models\jobs\Jobs;
use App\Models\location\City;
use App\Models\location\Country;
use App\Models\mountains\Mountains;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data=[
            'users'=>AccountsAccounts::count(),
            'companies'=>Companies::count(),
            'companies0'=>Companies::where('deactivated',0)->count(),
            'rates_companies'=>Rate_Companies::count(),
            'rm_avg'=>Rate_Companies::avg('rate_score'),
            'countries'=>Country::count(),
            'cities'=>City::count(),
            'blogs'=>Articles::count(),
            'blogs0'=>Articles::where('deactivated',0)->count(),
            'jobs'=>Jobs::count(),
            'jobs0'=>Jobs::where('deactivated',0)->count(),
            'rates_jobs'=>Rate_Jobs::count(),
            'rg_avg'=>Rate_Jobs::avg('rate_score'),
            'likes_companies'=>Like_Companies::count(),
            'likes_jobs'=>Like_Jobs::count(),
            'likes_blogs'=>Like_Articles::count(),
            'articlesList' => Articles::where('deactivated', 0)->orderby('id', 'DESC')->take(10)->get(),
            'accountsList' => AccountsAccounts::where('deactivated', 0)->orderby('id', 'DESC')->take(16)->get(),
            'notify'=>Emails::where('status',0)->orderBy('id', 'DESC')->count(),
            'emailNotify'=>Emails::where('status',0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        $data['likes_all'] = $data['likes_companies'] + $data['likes_jobs'] + $data['likes_blogs'];

        return view('AdminLte/main-page/dashboard/dashboard')->with($data);
    }

    public function messMaker($icon, $mess, $text){
        session()->put('icon', $icon);
        session()->put('mess', $mess);
        session()->put('text', $text);
    }





}


