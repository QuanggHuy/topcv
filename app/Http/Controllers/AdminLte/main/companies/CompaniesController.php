<?php

namespace App\Http\Controllers\AdminLte\main\companies;

use App\Http\Controllers\Controller;
use App\Models\location\City;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\mountains\Mountains;
use App\Models\mountains\Mountains_photo;
use App\Models\mountains\Mountains_video;

use Illuminate\Support\Facades\DB;
use App\Models\location\Country;
use App\Models\location\Country_mountain;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\accounts\Rate_Mountains;
use App\Models\accounts\Rate_Groups;
use App\Models\emails\Emails;
use App\Models\companies\Companies;
use App\Models\companies\Companies_photo;
use App\Models\companies\Companies_video;
use App\Models\location\Country_companies;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {

        $data = [
            'companiesList' => Companies::orderby('deactivated', 'ASC')->orderby('id', 'ASC')->get(),
            'photoList' => Companies_photo::get(),
            'videoList' => Companies_video::get(),
            'countriesList' => Country::get(),
            'countryList' => DB::table('countries')
                ->select('countries.*', 'country_companies.company_id')
                ->join('country_companies', 'country_companies.country_id', '=', 'countries.id')
                ->get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()

        ];

        return view('AdminLte/main-page/companies/table')->with($data);
    }

    public function activate(Request $request)
    {
        $button = $request->get('button');
        if ($button != null) {
            if ($button == 'activate') {
                $data = [
                    'deactivated' => 0
                ];
                Companies::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Activate Company Successfully !', 'Company id "' . $request->get('id') . '" has been activate in to database');
            } else if ($button == 'deactivate') {
                $data = [
                    'deactivated' => 1
                ];
                Companies::where('id', $request->get('id'))->update($data);
                $this->messMaker('success', 'Deactivate Company Successfully !', 'Company id "' . $request->get('id') . '" has been deactivate in to database');
            }
        }

        $currentUrl = $request->get('currentUrl');
        if ($currentUrl != null) {

            return redirect($currentUrl);
        }

        return redirect('/admin/companies/table');
    }
    public function addForm()
    {
        $data = [
            'countriesList' => Country::get(),
            'companiesList' => Companies::get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        return view('AdminLte/main-page/companies/add')->with($data);
    }

    public function proccessAdd(Request $request)
    {
        $button = $request->get('button');
        if ($button != null && $button == 'add') {
            $name = $request->input('company_name');
            $link = $request->input('link');
            $employee = $request->input('employee');
            $follower = $request->input('follower');
            $desciption = $request->get('description');
            $location = $request->get('location');
            $api = $request->get('api');
            $deactivated = $request->has('status') ? 0 : 1;

            DB::beginTransaction();
            $main_photo = $request->file('main-photo');
            if ($main_photo == null) {
                $mainPhotoName = null;
            } else {
                $mainPhotoName = now()->timestamp . "_" . $main_photo->getClientOriginalName();
            }
            $background_photo = $request->file('background-photo');
            if ($background_photo == null) {
                $backgroundPhotoName = null;
            } else {
                $backgroundPhotoName = now()->timestamp . "_" . $background_photo->getClientOriginalName();
            }
            try {
                // Thêm dữ liệu vào bảng Mountain
                $company = new Companies();
                $company->name = $name;
                $company->link = $link;
                $company->employee = $employee;
                $company->follower = $follower;
                $company->description = $desciption;
                // $mountain->history = $history;
                // $mountain->guides = $guides;
                $company->location = $location;
                $company->api = $api;
                // $mountain->sheltering = $sheltering;
                // $mountain->dangers = $danger;
                $company->photo_main = $mainPhotoName;
                $company->photo_background = $backgroundPhotoName;
                $company->deactivated = $deactivated;
                // Thêm các trường khác tương ứng
                $company->save();

                $companyId = (int) $company->id;


                $companyPath = public_path('img/companies/' . $companyId);

                if (!File::isDirectory($companyPath)) {
                    File::makeDirectory($companyPath, 0755, true, true);
                }
                if ($request->hasFile('main-photo')) {
                    $main_photo = $request->file('main-photo');
                    $main_photo->move(public_path('img/companies/' . $companyId), $mainPhotoName);
                    try {
                        $add_photo = [
                            "name" => $mainPhotoName,
                            'company_id' => $companyId
                        ];
                        Companies_photo::create($add_photo);
                    } catch (\Exception $e) {
                        $data = [
                            'exception' => $e->getMessage()
                        ];
                        return view('AdminLte/main-page/companies/test')->with($data);
                    }
                }
                if ($request->hasFile('background-photo')) {
                    $background_photo = $request->file('background-photo');
                    $background_photo->move(public_path('img/companies/' . $companyId), $backgroundPhotoName);
                    try {
                        $add_photo = [
                            "name" => $backgroundPhotoName,
                            'company_id' => $companyId
                        ];
                        Companies_photo::create($add_photo);
                    } catch (\Exception $e) {
                        $data = [
                            'exception' => $e->getMessage()
                        ];
                        return view('AdminLte/main-page/companies/test')->with($data);
                    }
                }

                // Thêm dữ liệu vào bảng MountainPhoto
                if ($request->hasFile('related-photo')) {
                    foreach ($request->file('related-photo') as $photo) {
                        $timestamp = now()->timestamp;
                        $filename = $photo->getClientOriginalName();
                        $newFileName = $timestamp . '_' . $filename; // Đổi tên file
                        $photo->move(public_path('img/companies/' . $companyId), $newFileName);


                        try {
                            $add_photo = [
                                "name" => $newFileName,
                                'company_id' => $companyId
                            ];
                            Companies_photo::create($add_photo);
                        } catch (\Exception $e) {
                            $data = [
                                'exception' => $e->getMessage()
                            ];
                            return view('AdminLte/main-page/companies/test')->with($data);
                        }
                    }
                }

                if ($request->hasFile('video')) {
                    foreach ($request->file('video') as $video) {
                        $timestamp = now()->timestamp;
                        $vidname = $video->getClientOriginalName();
                        $newVidName = $timestamp . '_' . $vidname; // Đổi tên file
                        $video->move(public_path('img/companies/' . $companyId), $newVidName);

                        try {
                            $add_video = [
                                "name" => $newVidName,
                                'mountain_id' => $companyId
                            ];
                            Companies_video::create($add_video);
                        } catch (\Exception $e) {
                            $data = [
                                'exception' => $e->getMessage()
                            ];
                            return view('AdminLte/main-page/companies/test')->with($data);
                        }
                    }
                }

                $countries = $request->get('countries');
                if ($countries != null) {
                    foreach ($countries as $country) {

                        Country_companies::create([
                            'country_id' => $country,
                            'company_id' => $companyId
                        ]);
                    };
                }

                DB::commit();
                $this->messMaker('success', 'Add Company Successfully !', 'Company id "' . $companyId . '" has been add in to database');

                return redirect('/admin/companies/table');
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }
        }


        return redirect('/admin/companies/table');
    }


    public function proccessUpdate(Request $request)
    {
        $button = $request->get('button');
        if ($button != null && $button == 'update') {
            $id = $request->input('id');
            $name = $request->input('company_name');
            $desciption = $request->get('description');
            $link = $request->input('link');
            $employee = $request->input('employee');
            $follower = $request->input('follower');
            $location = $request->get('location');
            $api = $request->get('api');
            $currentMainPhoto = $request->get('mainPhotoName');
            $currentBackgroundPhoto = $request->get('backgroundPhotoName');

            DB::beginTransaction();
            $finalMainPhoto = '';
            $main_photo = $request->file('main-photo');
            if ($main_photo == null) {
                $mainPhotoName = null;
            } else {
                $mainPhotoName = now()->timestamp . "_" . $main_photo->getClientOriginalName();
            }
            $finalBackgroundPhoto = '';
            $background_photo = $request->file('background-photo');
            if ($background_photo == null) {
                $backgroundPhotoName = null;
            } else {
                $backgroundPhotoName = now()->timestamp . "_" . $background_photo->getClientOriginalName();
            }
            try {
                $company = Companies::find($id);
                $company->name = $name;
                $company->description = $desciption;
                $company->link = $link;
                $company->employee = $employee;
                $company->follower = $follower;
                $company->location = $location;
                $company->api = $api;
                if ($main_photo != null) {
                    $company->photo_main = $mainPhotoName;
                    $finalMainPhoto = $mainPhotoName;
                } else {
                    $company->photo_main = $currentMainPhoto;
                    $finalMainPhoto = $currentMainPhoto;
                }if ($background_photo != null) {
                    $company->photo_background = $backgroundPhotoName;
                    $finalbackgroundPhoto = $backgroundPhotoName;
                } else {
                    $company->photo_background = $currentBackgroundPhoto;
                    $finalBackgroundPhoto = $currentBackgroundPhoto;
                }
                $company->save();

                $companyId = (int) $company->id;


                $companyPath = public_path('img/companies/' . $companyId);

                if (!File::isDirectory($companyPath)) {
                    File::makeDirectory($companyPath, 0755, true, true);
                }

                if ($request->hasFile('main-photo')) {
                    $main_photo = $request->file('main-photo');
                    $main_photo->move(public_path('img/companies/' . $companyId), $mainPhotoName);
                    try {
                        Companies_photo::where('company_id', $id)->where('name', '=', $currentMainPhoto)->delete();
                        $add_photo = [
                            "name" => $mainPhotoName,
                            'company_id' => $companyId
                        ];
                        echo $currentMainPhoto . '<br>' . $finalMainPhoto . '<br>';
                        Companies_photo::create($add_photo);
                    } catch (\Exception $e) {
                        $data = [
                            'exception' => $e->getMessage()
                        ];
                        return view('AdminLte/main-page/companies/test')->with($data);
                    }
                }
                if ($request->hasFile('background-photo')) {
                    $background_photo = $request->file('background-photo');
                    $background_photo->move(public_path('img/companies/' . $companyId), $backgroundPhotoName);
                    try {
                        Companies_photo::where('company_id', $id)->where('name', '=', $currentBackgroundPhoto)->delete();
                        $add_photo = [
                            "name" => $backgroundPhotoName,
                            'company_id' => $companyId
                        ];
                        echo $currentBackgroundPhoto . '<br>' . $finalBackgroundPhoto . '<br>';
                        Companies_photo::create($add_photo);
                    } catch (\Exception $e) {
                        $data = [
                            'exception' => $e->getMessage()
                        ];
                        return view('AdminLte/main-page/companies/test')->with($data);
                    }
                }

                // Thêm dữ liệu vào bảng Companies_Photo
                if ($request->hasFile('related-photo')) {
                    Companies_photo::where('company_id', $id)->where('name', '!=', $finalMainPhoto)->delete();
                    foreach ($request->file('related-photo') as $photo) {
                        $timestamp = now()->timestamp;
                        $filename = $photo->getClientOriginalName();
                        $newFileName = $timestamp . '_related_' . $filename; // Đổi tên file
                        $photo->move(public_path('img/companies/' . $companyId), $newFileName);


                        try {
                            $add_photo = [
                                "name" => $newFileName,
                                'company_id' => $companyId
                            ];
                            Companies_photo::create($add_photo);
                        } catch (\Exception $e) {
                            $data = [
                                'exception' => $e->getMessage()
                            ];
                            return view('AdminLte/main-page/companies/test')->with($data);
                        }
                    }
                }

                if ($request->hasFile('video')) {
                    Companies_video::where('company_id', $id)->delete();
                    foreach ($request->file('video') as $video) {
                        $timestamp = now()->timestamp;
                        $vidname = $video->getClientOriginalName();
                        $newVidName = $timestamp . '_' . $vidname; // Đổi tên file
                        $video->move(public_path('img/companies/' . $companyId), $newVidName);

                        try {
                            $add_video = [
                                "name" => $newVidName,
                                'company_id' => $companyId
                            ];
                            Companies_video::create($add_video);
                        } catch (\Exception $e) {
                            $data = [
                                'exception' => $e->getMessage()
                            ];
                            return view('AdminLte/main-page/companies/test')->with($data);
                        }
                    }
                }

                $countries = $request->get('countries');
                Country_companies::where('company_id', $id)->delete();

                if ($countries != null) {

                    foreach ($countries as $country) {

                        Country_companies::create([
                            'country_id' => $country,
                            'company_id' => $companyId
                        ]);
                    };
                }


                DB::commit();
                $this->messMaker('success', 'Update company Successfully !', 'company id "' . $companyId . '" has been update in to database');

                return redirect('/admin/companies/table');
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }
        }
        return redirect('/admin/companies/table');
    }



    public function detail(Request $request)
    {
        $id = $request->get('id');
        $data = [
            'company' => Companies::where('id', $id)->first(),
            'photoList' => Companies_photo::get(),
            'videoList' => Companies_video::get(),
            'countriesList' => Country::get(),
            'countryList' => DB::table('countries')
                ->select('countries.*', 'country_companies.company_id')
                ->join('country_companies', 'country_companies.country_id', '=', 'countries.id')
                ->get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];
        return view('AdminLte/main-page/companies/detail')->with($data);
    }


    public function getCurrentInfo(Request $request)
    {
        $id = $request->get('id');
        $company = Companies::where('id', $id)->first();
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        $companyName = $company->name;
        $photoList = Companies_photo::where('company_id', $id)->get();
        $videoList = Companies_video::where('company_id', $id)->get();

        return response()->json(
            array(
                'company' => $company,
                'name' => $company->name
            ),
            200
        );
    }
    public function rateCompanies()
    {

        $companiesList = DB::table('companies')
            ->select("companies.id", 'companies.name', 'companies.photo_main', DB::raw('ROUND(AVG(rates_companies.rate_score), 0) as averageRating'))
            ->leftJoin("rates_companies", 'rates_companies.company_id', '=', 'companies.id')
            ->groupBy("companies.id", 'companies.name', 'companies.photo_main')
            ->orderBy('companies.deactivated', 'ASC')
            ->orderBy('averageRating', 'DESC')
            ->get();


        $data = [
            'companiesList' => $companiesList,
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'notify' => Emails::where('status', 0)->orderBy('id', 'DESC')->count(),
            'emailNotify' => Emails::where('status', 0)->orderBy('id', 'DESC')->take(3)->get(),
            'addCountryList' => Country::get(),
            'validateCityList' => City::get(),
            'validateCountryList' => Country::get()
        ];

        return view('AdminLte/main-page/rating/rateCompanies')->with($data);
    }
    public function addCountry(Request $request)
    {
        $button = $request->get('button');
        if ($button != null && $button == 'addCountry') {
            $name = $request->get('name');

            DB::beginTransaction();

            try {
                // Thêm dữ liệu vào bảng Country
                $country = new Country();
                $country->name = $name;

                $country->save();

                DB::commit();
                $this->messMaker('success', 'Add Country Successfully !', 'Country name "' . $name . '" has been add in to database');

                return redirect()->back();
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }
        }


        return redirect()->back();
    }

    public function addCity(Request $request)
    {
        $button = $request->get('button');
        if ($button != null && $button == 'addCity') {
            $name = $request->get('name');
            $countryId = $request->get('countryId');
            DB::beginTransaction();

            try {
                // Thêm dữ liệu vào bảng Mountain
                $city = new City();
                $city->name = $name;
                $city->country_id = $countryId;
                $city->save();

                DB::commit();
                $this->messMaker('success', 'Add City Successfully !', 'City name "' . $name . '" has been add in to database');

                return redirect()->back();
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/companies/test')->with($data);
            }
        }


        return redirect()->back();
    }

    public function messMaker($icon, $mess, $text)
    {
        session()->put('icon', $icon);
        session()->put('mess', $mess);
        session()->put('text', $text);
    }
}
