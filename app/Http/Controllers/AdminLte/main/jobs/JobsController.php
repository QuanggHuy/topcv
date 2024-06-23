<?php
namespace App\Http\Controllers\AdminLte\main\jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\mountains\Mountains;
use App\Models\mountains\Mountains_photo;
use App\Models\mountains\Mountains_video;
use App\Models\accounts\Accounts;
use App\Models\companies\Companies;
use App\Models\cvs\UserCvs;
use App\Models\groups\Groups;
use App\Models\groups\Group_mountain;
use App\Models\location\Country;
use App\Models\location\City;
use App\Models\location\Country_mountain;
use App\Models\emails\Emails;
use App\Models\jobs\ApplicationsJob;
use App\Models\jobs\Jobs;
use App\Models\jobs\Jobs_companies;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class JobsController extends Controller
{
    public function index(Request $request)
    {
        // $data=[
        //     'mountainsList' => Mountains::get(),
        //     'countryList' => Country::get()
        // ];
        $data = [
            'citiesList' => City::get(),
            'companiesList' => Companies::get(),
            'jobsList' => DB::table('jobs')
                ->select('jobs.*', 'cities.name as cityName')
                ->leftJoin('cities', 'jobs.city_id', '=', 'cities.id')
                ->orderby('jobs.deactivated', 'ASC')
                ->orderby('jobs.id', 'ASC')
                ->get(),
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


        return view('AdminLte/main-page/jobs/table')->with($data);
    }

    public function activate(Request $request)
    {
        $button = $request->get('button');
        if ($button != null) {
            if ($button == 'activate') {
                $data = [
                    'deactivated' => 0
                ];
                Jobs::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Activate Job Successfully !', 'Job id "' . $request->get('id') . '" has been activate in to database');

            } else if ($button == 'deactivate') {
                $data = [
                    'deactivated' => 1
                ];
                Jobs::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Deactivate Article Successfully !', 'Job id "' . $request->get('id') . '" has been deactivate in to database');

            }
        }

        $currentUrl = $request->get('currentUrl');
        if ($currentUrl != null) {

            return redirect($currentUrl);
        }


        return redirect('/admin/jobs/table');
    }
    public function addForm()
    {
        $data = [
            'citiesList' => City::get(),
            'companiesList' => Companies::get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        return view('AdminLte/main-page/jobs/add')->with($data);
    }
    public function proccessAdd(Request $request)
    {

        $button = $request->get('button');
        if ($button != null && $button == 'add') {
            $name = $request->input('name');
            // $leader = $request->input('leader');
            $title = $request->input('title');
            $salary = $request->input('salary');
            $experience = $request->input('experience');
            $description = $request->get('description');
            $contact = $request->get('contact');
            $city_id = $request->get('cityId');
            $api = $request->get('api');
            $deactivated = $request->has('status') ? 0 : 1;




            DB::beginTransaction();
            $main_photo = $request->file('main-photo');
            if ($main_photo == null) {
                $mainPhotoName = null;
            } else {
                $mainPhotoName = now()->timestamp . "_" . $main_photo->getClientOriginalName();
            }
            try {
                // Thêm dữ liệu vào bảng Mountain
                $jobs = new Jobs();
                $jobs->name = $name;
                $jobs->photo = $mainPhotoName;
                // $groups->leader_name = $leader;

                $jobs->title = $title;
                $jobs->salary = $salary;
                $jobs->experience = $experience;

                $jobs->description = $description;
                $jobs->contact = $contact;
                $jobs->api = $api;
                $jobs->city_id = $city_id == -1 ? null : $city_id;
                $jobs->deactivated = $deactivated;

                // Thêm các trường khác tương ứng
                $jobs->save();

                $jobId = (int) $jobs->id;


                $jobPath = public_path('img/jobs/' . $jobId);

                if (!File::isDirectory($jobPath)) {
                    File::makeDirectory($jobPath, 0755, true, true);
                }
                if ($request->hasFile('main-photo')) {
                    $main_photo = $request->file('main-photo');

                    $main_photo->move(public_path('img/jobs/' . $jobId), $mainPhotoName);

                }
                $companies = $request->get('companies');
                if ($companies != null) {
                    foreach ($companies as $company) {

                        Jobs_companies::create([
                            'company_id' => $company,
                            'job_id' => $jobId
                        ]);

                    }
                    ;
                }

                DB::commit();
                $this->messMaker('success', 'Add Job Successfully !', 'Job id "' . $jobId . '" has been add in to database');

                return redirect('/admin/jobs/table');
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }


        }


        return redirect('/admin/accounts/table');
    }

    public function proccessUpdate(Request $request)
    {

        $button = $request->get('button');
        if ($button != null && $button == 'update') {
            $id = $request->input('id');
            $name = $request->input('name');
            // $leader = $request->input('leader');
            $title = $request->input('title');
            $salary = $request->input('salary');
            $experience = $request->input('experience');

            $description = $request->get('description');
            $contact = $request->get('contact');
            $city_id = $request->get('cityId');
            $api = $request->get('api');




            DB::beginTransaction();
            $main_photo = $request->file('main-photo');
            if ($main_photo == null) {
                $mainPhotoName = null;
            } else {
                $mainPhotoName = now()->timestamp . "_" . $main_photo->getClientOriginalName();
            }
            try {
                // Thêm dữ liệu vào bảng Mountain
                $jobs = Jobs::find($id);
                $jobs->name = $name;
                if ($main_photo != null) {
                    $jobs->photo = $mainPhotoName;
                }
                //$groups->photo = $mainPhotoName;
                // $groups->leader_name = $leader;

                $jobs->title = $title;
                $jobs->salary = $salary;
                $jobs->experience = $experience;

                $jobs->description = $description;
                $jobs->contact = $contact;
                $jobs->api = $api;
                $jobs->city_id = $city_id == -1 ? null : $city_id;

                // Thêm các trường khác tương ứng
                $jobs->save();

                $jobId = (int) $jobs->id;


                $jobPath = public_path('img/jobs/' . $jobId);

                if (!File::isDirectory($jobPath)) {
                    File::makeDirectory($jobPath, 0755, true, true);
                }
                if ($request->hasFile('main-photo')) {
                    $main_photo = $request->file('main-photo');

                    $main_photo->move(public_path('img/jobs/' . $jobId), $mainPhotoName);

                }



                $companies = $request->get('companies');
                Jobs_companies::where('job_id', $id)->delete();
                if ($companies != null) {
                    foreach ($companies as $company) {

                        Jobs_companies::create([
                            'company_id' => $company,
                            'job_id' => $jobId
                        ]);

                    };
                }

                DB::commit();
                $this->messMaker('success', 'Update Job Successfully !', 'Job id "' . $jobId . '" has been update in to database');

                return redirect('/admin/jobs/table');
            } catch (\Exception $e) {
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }


        }


        return redirect('/admin/accounts/table');
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $data = [
            'citiesList' => City::get(),
            'companiesList' => Companies::get(),
            'job' => DB::table('jobs')
                ->select('jobs.*', 'cities.name as cityName')
                ->leftJoin('cities', 'jobs.city_id', '=', 'cities.id')
                ->where('jobs.id', $id)
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
        return view('AdminLte/main-page/jobs/detail')->with($data);
    }
    public function rateJobs()
    {

        $jobsList = Jobs::orderby('deactivated', 'ASC')->orderby('id', 'ASC')->get();
        // foreach ($jobsList as $group) {
        //     // Tính trung bình điểm đánh giá và lưu vào thuộc tính của mỗi đối tượng ngọn núi
        //     $group->averageRating = Rate_jobs::where('group_id', $group->id)->avg('rate_score') ?? 0;
        // }

        $jobsList = DB::table('jobs')
            ->select("jobs.id", 'jobs.name', 'jobs.photo', DB::raw('ROUND(AVG(rates_jobs.rate_score), 0) as averageRating'))
            ->leftJoin("rates_jobs", 'rates_jobs.job_id', '=', 'jobs.id')
            ->groupBy("jobs.id", 'jobs.name', 'jobs.photo')
            ->orderBy('jobs.deactivated', 'ASC')
            ->orderBy('averageRating', 'DESC')
            ->get();

        // Chỉ cần gửi danh sách ngọn núi đến view, mỗi ngọn núi giờ đã có thêm thuộc tính trung bình điểm đánh giá
        $data = [
            'jobsList' => $jobsList,
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        return view('AdminLte/main-page/rating/rateJobs')->with($data);
    }

    public function messMaker($icon, $mess, $text)
    {
        session()->put('icon', $icon);
        session()->put('mess', $mess);
        session()->put('text', $text);
    }


}


