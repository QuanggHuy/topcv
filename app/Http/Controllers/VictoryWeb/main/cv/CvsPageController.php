<?php

namespace App\Http\Controllers\VictoryWeb\main\cv;

use App\Http\Controllers\Controller;


use App\Models\location\City;
use Illuminate\Support\Facades\DB;
use App\Models\accounts\Like_Jobs;
use App\Models\accounts\Rate_Jobs;
use App\Models\cvs\CvTemplates;
use App\Models\cvs\JobsApply;
use App\Models\cvs\JobsApplySkills;
use App\Models\cvs\UserCvs;
use App\Models\cvs\UserCvsSkills;
use App\Models\jobs\Jobs;
use App\Models\UserCvSkills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CvsPageController extends Controller
{
    public function index()
    {

        $data = [
            'cv_templates' => CvTemplates::get(),
        ];

        return view('VictoryWeb/main-page/cv-page/index')->with($data);
    }
    public function addForm($id)
    {

        $data = [
            'cv_template' => CvTemplates::where('id', $id)->first(),
        ];

        return view('VictoryWeb/main-page/cv-page/add')->with($data);
    }
    public function proccessAdd(Request $request)
    {
        DB::beginTransaction(); // Bắt đầu giao dịch

        try {
            // Lấy tất cả dữ liệu từ request
            $user_id = session()->get('user')->id;
            $name = $request->name;
            $cv_template_id = $request->cv_template_id;
            $deactivated = $request->has('status') ? 0 : 1;
            $avatar = $request->file('avatar');
            if ($avatar == null) {
                $avatarName = null;
            } else {
                $avatarName = now()->timestamp . "_" . $avatar->getClientOriginalName();
            }
            $image = $request->file('cv_image');
            if ($image == null) {
                $imageName = ''; // Đặt giá trị mặc định cho cột `image` nếu không có tệp được tải lên
            } else {
                $imageName = now()->timestamp . "_" . $image->getClientOriginalName();
            }

            $userCv = new UserCvs();
            $userCv->user_id = $user_id;
            $userCv->name = $name;
            $userCv->avatar = $avatarName;
            $userCv->image = $imageName;
            $userCv->cv_template_id = $cv_template_id;
            $userCv->deactivated = $deactivated;
            $userCv->save();

            $userCvId = (int) $userCv->id;

            if (!File::isDirectory(public_path('img/avatarCvs/' . $userCvId))) {
                File::makeDirectory(public_path('img/avatarCvs/' . $userCvId), 0755, true, true);
            }
            if (!File::isDirectory(public_path('img/imageCvs/' . $userCvId))) {
                File::makeDirectory(public_path('img/imageCvs/' . $userCvId), 0755, true, true);
            }

            if ($request->hasFile('avatar')) {
                $avatar_photo = $request->file('avatar');
                $avatar_photo->move(public_path('img/avatarCvs/' . $userCvId), $avatarName);
            }
            if ($request->hasFile('cv_image')) {
                $image_photo = $request->file('cv_image');
                $image_photo->move(public_path('img/imageCvs/' . $userCvId), $imageName);
            }

            DB::commit(); // Commit giao dịch

            return redirect('/account/profile');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback giao dịch

            $data = [
                'exception' => $e->getMessage()
            ];
            return view('AdminLte/main-page/companies/test')->with($data);
        }
    }
    public function detail($id)
    {
        $userCv =  UserCvs::where('id', $id)->first();

        $data = [
            'userCv' => $userCv,
        ];
        return view('VictoryWeb/main-page/cv-page/detail')->with($data);
    }
    public function delete($id)
    {
        echo 'qưertyui';
        // UserCvs::where('id', $id)->delete();
        // return redirect('/account/profile');
    }
}
