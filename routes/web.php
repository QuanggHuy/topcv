<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLte\login\LoginController;
use App\Http\Controllers\AdminLte\main\dashboard\DashboardController;
use App\Http\Controllers\AdminLte\main\companies\CompaniesController;
use App\Http\Controllers\AdminLte\main\accounts\AccountsController;
use App\Http\Controllers\AdminLte\main\apply\ApplyController;
use App\Http\Controllers\AdminLte\main\articles\ArticlesController;
use App\Http\Controllers\AdminLte\main\groups\GroupsController;
use App\Http\Controllers\AdminLte\main\contact\EmailsController;
use App\Http\Controllers\AdminLte\main\jobs\JobsController;
use App\Http\Controllers\VictoryWeb\main\home\HomePageController;
use App\Http\Controllers\VictoryWeb\main\mountain\MountainPageController;
use App\Http\Controllers\VictoryWeb\main\article\ArticlePageController;
use App\Http\Controllers\VictoryWeb\main\group\GroupPageController;
use App\Http\Controllers\VictoryWeb\main\aboutus\AboutusPageController;
use App\Http\Controllers\VictoryWeb\login\LoginPageController;
use App\Http\Controllers\VictoryWeb\main\account\AccountPageController;
use App\Http\Controllers\VictoryWeb\main\contact\ContactPageController;

use App\Http\Controllers\nhap\AboutUsControllerNhap;
use App\Http\Controllers\nhap\ArticleControllerNhap;
use App\Http\Controllers\nhap\DestinationControllerNhap;
use App\Http\Controllers\nhap\GroupControllerNhap;
use App\Http\Controllers\nhap\HomeControllerNhap;
use App\Http\Controllers\nhap\MountainControllerNhap;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\VictoryWeb\main\companies\CompaniesPageController;
use App\Http\Controllers\VictoryWeb\main\cv\CvsPageController;
use App\Http\Controllers\VictoryWeb\main\job\JobPageController;
use App\Http\Controllers\VictoryWeb\main\jobs\JobsPageController;
use App\Models\resetpassword\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'index'])->middleware('RedirectLogin::class');
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/getNewestAdminLoginId', [LoginController::class, 'getNewestAdminLoginId']);

    Route::post('/proccessLogin', [LoginController::class, 'proccessLogin']);
    Route::post('/proccessRegister', [LoginController::class, 'proccessRegister']);

    Route::get('/register', [LoginController::class, 'register']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('checkAdminlogin::class');
    Route::get('/removeMessSession', [LoginController::class, 'removeMessSession']);
    Route::post('/test', [LoginController::class, 'test']);
    Route::post('/store', [LoginController::class, 'store'])->name('store');

    Route::group(['prefix' => 'companies', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/table', [CompaniesController::class, 'index']);
        Route::post('/activate', [CompaniesController::class, 'activate']);
        Route::get('/add', [CompaniesController::class, 'addForm']);
        Route::post('/proccessAdd', [CompaniesController::class, 'proccessAdd']);
        Route::post('/proccessUpdate', [CompaniesController::class, 'proccessUpdate']);
        Route::get('/detail', [CompaniesController::class, 'detail']);
        Route::get('/getCurrentInfo', [CompaniesController::class, 'getCurrentInfo']);
        Route::post('/addCountry', [CompaniesController::class, 'addCountry']);
        Route::post('/addCity', [CompaniesController::class, 'addCity']);
        // Route::post('/addCountry', [MountainsController::class, 'addCountry']);
        // Route::post('/addCity', [MountainsController::class, 'addCity']);
    });

    Route::group(['middleware' => 'checkAdminlogin'], function () {
        Route::post('/addCountry', [CompaniesController::class, 'addCountry']);
        Route::post('/addCity', [CompaniesController::class, 'addCity']);
    });

    Route::group(['prefix' => 'accounts', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/table', [AccountsController::class, 'index']);
        Route::get('/add', [AccountsController::class, 'addForm']);
        Route::post('/proccessAdd', [AccountsController::class, 'proccessAdd']);
        Route::post('/activate', [AccountsController::class, 'activate']);
        Route::post('/proccessUpdate', [AccountsController::class, 'proccessUpdate']);
        Route::post('/proccessUpdateAdminPassword', [AccountsController::class, 'proccessUpdateAdminPassword']);
        Route::get('/profile', [AccountsController::class, 'profile']);
        Route::get('/removeComment', [AccountsController::class, 'removeComment'])->name('removeComment');
        Route::get('/test', [AccountsController::class, 'test']);
    });

    Route::group(['prefix' => 'articles', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/table', [ArticlesController::class, 'index']);
        Route::post('/activate', [ArticlesController::class, 'activate']);
        Route::post('/proccessAdd', [ArticlesController::class, 'proccessAdd']);
        Route::get('/add', [ArticlesController::class, 'addForm']);
        Route::post('/proccessUpdate', [ArticlesController::class, 'proccessUpdate']);
        Route::get('/detail', [ArticlesController::class, 'detail']);
        Route::get('/getCurrentInfo', [ArticlesController::class, 'getCurrentInfo']);
    });

    Route::group(['prefix' => 'jobs', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/table', [JobsController::class, 'index']);
        Route::post('/activate', [JobsController::class, 'activate']);
        Route::post('/proccessAdd', [JobsController::class, 'proccessAdd']);
        Route::get('/add', [JobsController::class, 'addForm']);
        Route::post('/proccessUpdate', [JobsController::class, 'proccessUpdate']);
        Route::get('/detail', [JobsController::class, 'detail']);
    });

    Route::group(['prefix' => 'rating', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/rateCompanies', [CompaniesController::class, 'rateCompanies']);
        Route::get('/rateJobs', [JobsController::class, 'rateJobs']);
    });
    Route::group(['prefix' => 'contact', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/emails', [EmailsController::class, 'index']);
        Route::post('/read', [EmailsController::class, 'Read']);
    });
    Route::group(['prefix' => 'apply', 'middleware' => 'checkAdminlogin'], function () {
        Route::get('/table', [ApplyController::class, 'index']);
        Route::post('/read', [ApplyController::class, 'Read']);
    });
});



Route::group([], function () {
    Route::get('/', [HomePageController::class, 'index'])->middleware('checkUserLogin::class');
    Route::get('/home', [HomePageController::class, 'index'])->middleware('checkUserLogin::class');
    Route::get('/login', [LoginPageController::class, 'loginForm'])->middleware('RedirectLoginUser::class');
    Route::get('/logout', [LoginPageController::class, 'logout']);
    Route::get('/register', [LoginPageController::class, 'registerForm'])->middleware('RedirectLoginUser::class');
    Route::post('/proccessLogin', [LoginPageController::class, 'proccessLogin']);
    Route::post('/proccessRegister', [LoginPageController::class, 'proccessRegister']);
    Route::post('/store', [AccountsController::class, 'store'])->name('storeAccountImage');

    Route::group(['prefix' => 'account', 'middleware' => 'RedirectProfileUser'], function () {

        Route::get('/profile', [AccountPageController::class, 'index']);

        Route::post('/proccessUpdate', [AccountPageController::class, 'proccessUpdate']);
        //like
        Route::get('/CompaniesFavoriteList', [AccountPageController::class, 'addCompanies'])->name('addCompanies');

        Route::get('/ArticleFavoriteList', [AccountPageController::class, 'addArticle'])->name('addArticle');

        Route::get('/JobsFavoriteList', [AccountPageController::class, 'addJobs'])->name('addJobs');
        //rate
        Route::get('/CompaniesRateList', [AccountPageController::class, 'rateCompanies'])->name('rateCompanies');

        Route::get('/JobsRateList', [AccountPageController::class, 'rateJobs'])->name('rateJobs');
        //comment
        Route::get('/comment', [AccountPageController::class, 'comment'])->name('comment');
    });

    Route::group(['prefix' => 'companies', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [CompaniesPageController::class, 'index']);
        Route::get('/detail', [CompaniesPageController::class, 'detail']);
        Route::get('/search', [CompaniesPageController::class, 'searchCompanies'])->name('searchCompanies');
    });

    Route::group(['prefix' => 'blogs', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [ArticlePageController::class, 'index']);
        Route::get('/detail', [ArticlePageController::class, 'detail']);
        Route::get('/search', [ArticlePageController::class, 'searchArticle'])->name('searchArticle');
    });

    Route::group(['prefix' => 'jobs', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [JobsPageController::class, 'index']);
        Route::get('/detail', [JobsPageController::class, 'detail']);
        Route::post('/save', [JobsPageController::class, 'apply']);
        Route::get('/search', [JobsPageController::class, 'searchJobs'])->name('searchJobs');
    });

    Route::group(['prefix' => 'cv-template', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [CvsPageController::class, 'index']);
        Route::get('/add-form/{id}', [CvsPageController::class, 'addForm']);
        // Route::post('/upload-cv-image', [CvsPageController::class, 'uploadCvImage']);

        Route::get('/detail/{id}', [CvsPageController::class, 'detail']);
        Route::post('/proccess-add', [CvsPageController::class, 'proccessAdd']);
        // Route::post('/proccess-update', [CvsPageController::class, 'proccessUpdate']);
        Route::get('/delete/{id}', [CvsPageController::class, 'delete']);
        // Route::get('/search', [CvsPageController::class, 'searchCvs'])->name('searchCvs');
    });

    Route::group(['prefix' => 'aboutus', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [AboutusPageController::class, 'index']);
        Route::get('/detail', [AboutusPageController::class, 'detail']);
    });
    Route::group(['prefix' => 'contact', 'middleware' => 'checkUserLogin'], function () {
        Route::get('/', [ContactPageController::class, 'index']);
        Route::post('/send', [ContactPageController::class, 'send'])->middleware('throttle:1,1'); //->middleware('throttle:3,1440')
    });
});

Route::get('/password-reset/{token}', function ($token) {
    // Lấy email từ query parameters
    $email = request()->query('email');

    $passwordResetToken = PasswordResetToken::where('email', $email)->first();

    if (!$passwordResetToken || !Hash::check($token, $passwordResetToken->token) || Carbon::parse($passwordResetToken->created_at)->lte(Carbon::now()->subMinutes(30))) {
        //abort(404);

        return redirect('/');
    } else {

        return view('password-reset', ['token' => $token, 'email' => request()->query('email')]);
    }
})->name('password.reset');
Route::post('/reset-password-custom', [NewPasswordController::class, 'processUpdate'])->name('password.customUpdate');
Route::get('/forgotpassword', [LoginPageController::class, 'forgotpassword']);
