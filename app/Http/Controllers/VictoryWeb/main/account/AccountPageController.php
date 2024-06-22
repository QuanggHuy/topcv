<?php

namespace App\Http\Controllers\VictoryWeb\main\account;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\accounts\Accounts;
use App\Models\accounts\Like_Mountains;
use App\Models\accounts\Like_Articles;
use App\Models\accounts\Like_Groups;
use App\Models\accounts\Rate_Mountains;
use App\Models\accounts\Rate_Groups;
use App\Models\accounts\Comment;
use App\Models\accounts\Like_Companies;
use App\Models\accounts\Like_Jobs;
use App\Models\accounts\Rate_Companies;
use App\Models\accounts\Rate_Jobs;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountPageController extends Controller
{
    //mon custom
    public function index(Request $request)
    {
        $companiesLikeList = DB::table('likes_companies')
            ->select('likes_companies.*', 'companies.*')
            ->join('companies', 'id', '=', 'company_id')
            ->where('deactivated', 0)
            ->where('user_id', session()->get('user')->id)
            ->get();

        // Like_Companies::where('user_id', session()->get('user')->id)->join('')->get();

        $jobsLikeList = DB::table('likes_jobs')
            ->select('likes_jobs.*', 'jobs.*')
            ->join('jobs', 'id', '=', 'job_id')
            ->where('deactivated', 0)
            ->where('user_id', session()->get('user')->id)
            ->get();



        //Like_jobs::where('user_id', session()->get('user')->id)->get();

        $articleLikeList = DB::table('likes_articles')
            ->select('likes_articles.*', 'article.id', 'article.name', 'article.photo')
            ->join('article', 'id', '=', 'article_id')
            ->where('deactivated', 0)
            ->where('user_id', session()->get('user')->id)
            ->get();



        //Like_Articles::where('user_id', session()->get('user')->id)->get();

        $userCvsList = DB::table('user_cvs')
        ->where('user_id', session()->get('user')->id)
        ->get();

        $data = [
            'accountsCheckList' => Accounts::get(),
            'companiesLikeList' => $companiesLikeList,
            'jobsLikeList' => $jobsLikeList,
            'articleLikeList' => $articleLikeList,
            'userCvsList' => $userCvsList

        ];
        return view('VictoryWeb/main-page/account-page/profile')->with($data);
    }
    public function proccessUpdate(Request $request)
    {

        $button = $request->get('button');
        if ($button != null && $button == 'update') {
            $id = $request->input('id');
            $fullname = $request->input('fullname');
            $gender = $request->get('gender');
            $email = $request->get('email');
            $phone = $request->get('phone');

            $dob = $request->get('dob');

            $roleid = $request->get('roleid');
            $username = $request->get('username');

            $password = $request->get('password');

            DB::beginTransaction();
            $main_photo = $request->file('main-photo');
            if ($main_photo == null) {
                $mainPhotoName = null;
            } else if (session()->has('main-photo') && File::exists(public_path('img/accounts/temporary/' . session()->get('main-photo')))) {
                //$mainPhotoName = now()->timestamp . "_" . $main_photo->getClientOriginalName();
                $mainPhotoName = session()->get('main-photo');

            } else {
                $mainPhotoName = null;
            }
            try {
                // Thêm dữ liệu vào bảng Mountain
                $account = Accounts::find($id);
                if ($main_photo != null) {
                    $account->photo = $mainPhotoName;
                }
                //$account->photo = $mainPhotoName;
                //$account->username = $username;
                $account->fullname = $fullname;
                $account->gender = $gender;
                if ($password != null && $password != '') {
                    $account->password = Hash::make($password);
                }
                $account->email = $email;
                $account->dob = $dob;
                $account->phone = $phone;
                $account->role_id = $roleid;
                //$account->created = Carbon::now()->format('Y-m-d');

                // Thêm các trường khác tương ứng
                $account->save();

                $accountId = (int) $account->id;


                $accountPath = public_path('img/accounts/' . $accountId);

                if (!File::isDirectory($accountPath)) {
                    File::makeDirectory($accountPath, 0755, true, true);
                }
                // if ($request->hasFile('main-photo')) {
                //     $main_photo = $request->file('main-photo');

                //     $main_photo->move(public_path('img/accounts/' . $accountId), $mainPhotoName);

                // }
                if ($request->hasFile('main-photo') && session()->has('main-photo') && File::exists(public_path('img/accounts/temporary/' . session()->get('main-photo')))) {
                    // $main_photo = $request->file('main-photo');

                    // $main_photo->move(public_path('img/accounts/' . $accountId), $mainPhotoName);

                    session()->forget('main-photo');
                    $sourceFilePath = public_path('img/accounts/temporary/' . $mainPhotoName);

                    // Đường dẫn đích (thư mục đích + tên file mới)
                    $destinationFilePath = public_path('img/accounts/' . $accountId . '/' . $mainPhotoName);

                    // Copy file từ nguồn đến đích
                    File::copy($sourceFilePath, $destinationFilePath);

                    File::delete($sourceFilePath);
                }



                DB::commit();
                $this->messMaker('success', 'Update Account Successfully !', 'Your Infomation Has Been Updated !"');

                return redirect('/account/profile');
            } catch (\Exception $e) {
                DB::rollBack();
                $data = [
                    'exception' => $e->getMessage()
                ];
                return view('AdminLte/main-page/mountains/test')->with($data);
            }


        }


        return redirect('/admin/accounts/table');
    }
    public function addCompanies(Request $request)
    {
        $userID = session()->get('user')->id;
        $companyID = $request->get('companyID');
        $created = Carbon::now()->format('Y-m-d');
        $action = $request->get('action');
        $like = [
            "user_id" => $userID,
            'company_id' => $companyID,
            'created' => $created
        ];
        if ($action == 'add') {
            Like_Companies::create($like);

        } else if ($action == 'remove') {
            Like_Companies::where('user_id', $userID)->where('company_id', $companyID)->delete();
        }
    }
    public function addArticle(Request $request)
    {
        $userID = session()->get('user')->id;
        $articleID = $request->get('articleID');
        $created = Carbon::now()->format('Y-m-d');
        $action = $request->get('action');
        $like = [
            "user_id" => $userID,
            'article_id' => $articleID,
            'created' => $created
        ];
        if ($action == 'add') {
            Like_Articles::create($like);

        } else if ($action == 'remove') {
            Like_Articles::where('user_id', $userID)->where('article_id', $articleID)->delete();
        }
    }
    public function addJobs(Request $request)
    {
        $userID = session()->get('user')->id;
        $jobID = $request->get('jobID');
        $created = Carbon::now()->format('Y-m-d');
        $action = $request->get('action');
        $like = [
            "user_id" => $userID,
            'job_id' => $jobID,
            'created' => $created
        ];
        if ($action == 'add') {
            Like_Jobs::create($like);
        } else if ($action == 'remove') {
            Like_Jobs::where('user_id', $userID)->where('job_id', $jobID)->delete();
        }
    }
    public function rateCompanies(Request $request)
    {
        $userID = session()->get('user')->id;
        $companyID = $request->get('companyID');
        $score = $request->get('score');
        $created = Carbon::now()->format('Y-m-d');
        $rate = [
            "user_id" => $userID,
            'company_id' => $companyID,
            'rate_score' => $score,
            'created' => $created
        ];


        $company = Rate_Companies::where('user_id', $userID)->where('company_id', $companyID)->first();

        if ($company) {
            // Nếu đã tồn tại, cập nhật dữ liệu
            $company->where('user_id', $userID)->where('company_id', $companyID)->update($rate);
        } else {
            // Nếu chưa tồn tại, thêm mới dữ liệu
            Rate_Companies::create($rate);
        }
    }

    public function rateJobs(Request $request)
    {
        $userID = session()->get('user')->id;
        $jobID = $request->get('jobID');
        $score = $request->get('score');
        $created = Carbon::now()->format('Y-m-d');
        $rate = [
            "user_id" => $userID,
            'job_id' => $jobID,
            'rate_score' => $score,
            'created' => $created
        ];


        $job = Rate_Jobs::where('user_id', $userID)->where('job_id', $jobID)->first();

        if ($job) {
            // Nếu đã tồn tại, cập nhật dữ liệu
            $job->where('user_id', $userID)->where('job_id', $jobID)->update($rate);
        } else {
            // Nếu chưa tồn tại, thêm mới dữ liệu
            Rate_Jobs::create($rate);
        }
    }

    public function comment(Request $request)
    {
        $type = $request->get('type');
        $id = $request->get('id');
        $comment_text = $request->get('comment_text');
        //date_default_timezone_set('Asia/Ho_Chi_Minh'); 
        $created = Carbon::now()->toDateTimeString();

        $mountainID = null;
        $groupID = null;
        $articleID = null;
        if ($type == 'company') {
            $mountainID = $id;
        } else if ($type == 'job') {
            $groupID = $id;
        } else if ($type == 'article') {
            $articleID = $id;
        }
        $comment = [
            'user_id' => session()->get('user')->id,
            'created' => $created,
            'comment_text' => $comment_text,
            'company_id' => $mountainID,
            'job_id' => $groupID,
            'article_id' => $articleID

        ];
        Comment::create($comment);
    }


    public function messMaker($icon, $mess, $text)
    {
        session()->put('icon', $icon);
        session()->put('mess', $mess);
        session()->put('text', $text);
    }

}
