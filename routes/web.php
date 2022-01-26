<?php

use App\Http\Controllers\Api\SMSController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AskController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\ConseilController;
use App\Http\Controllers\MaladieController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\PosologieController;
use App\Models\FAQ;
use App\Models\Garde;
use App\Models\Information;
use App\Models\Maladie;
use App\Models\Posologie;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ['pharmacies' => Garde::all(), 'infos' => Information::all()]);
})->name("home");



Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        if (Auth::user()->profile) {

            if (Auth::user()->role != "admin" && Auth::user()->role != "staff") {
                return redirect('login')->with('info', "Votre compte a bien été creer, utilisez l'applcation mobile pour vous connecter");
            }
            return view('dashboard.index', ['pharmaciesCount' => Garde::count(), 'userCount' => User::count(), 'infoCount' => Information::count(), "FAQCount" => FAQ::count(), "maladieCount" => Maladie::count()]);
        }

        return view('auth.complete_profile');
    })->name('dashboard')->middleware('auth');



    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, "allUsersPage"])->name('dashboard.users');




        Route::post('/{id}/password-change',  [UserController::class, "setPassword"])->name('dashboard.users.changepassword');
        Route::post('/{id}/maladie-change',  [UserController::class, "setMaladie"])->name('dashboard.users.changemaladie');
        Route::post('/create',  [UserController::class, "createUser"]);
        Route::get('/create',  [UserController::class, "createUserPage"])->name('dashboard.users.create');
        Route::post('/carnet',  [CarnetController::class, "store"])->name('dashboard.carnet.store');
        Route::put('/carnet/{id}',  [CarnetController::class, "update"])->name('dashboard.carnet');
        Route::delete('/carnet/{id}',  [CarnetController::class, "destroy"]);
        Route::get('/{id}/edit',  [UserController::class, "editUserPage"])->name('dashboard.users.edit');
        Route::post('/{id}/edit',  [UserController::class, "update"])->name('dashboard.users.update');
        Route::get('/{id}',  [UserController::class, "show"])->name('dashboard.users.view');
    });



    Route::prefix('medicaments')->group(function () {
        Route::get('/', [MedicamentController::class, "index"])->name('dashboard.medicament');
        Route::get('/{id}',  [MedicamentController::class, "show"])->name('dashboard.medicament.view');

        Route::get('/create',  [MedicamentController::class, "create"])->name('dashboard.medicament.create');
        Route::post('/create',  [MedicamentController::class, "store"]);
        Route::view('/update/{id}',  [MedicamentController::class, "edit"])->name('dashboard.medicament.update');
        Route::put('/{id}',  [MedicamentController::class, "update"]);
        Route::delete('/{id}',  [MedicamentController::class, "destroy"]);

        Route::post('/posologie',  [PosologieController::class, "store"])->name('dashboard.posologie.store');
        Route::put('/posologie/{id}',  [PosologieController::class, "update"])->name('dashboard.posologie');
        Route::delete('/posologie/{id}',  [PosologieController::class, "destroy"]);
    });


    Route::prefix('faq')->group(function () {
        Route::get('/', [FAQController::class, "index"])->name('dashboard.faq');
        Route::get('/create',  [FAQController::class, "create"])->name('dashboard.faq.create');
        Route::post('/create',  [FAQController::class, "store"]);
    });


    Route::prefix('informations')->group(function () {
        Route::get('/', [InformationController::class, "index"])->name('dashboard.informations');
        Route::get('/create',  [InformationController::class, "create"])->name('dashboard.informations.create');
        Route::post('/create',  [InformationController::class, "store"]);
    });


    Route::prefix('pharmacies')->group(function () {
        Route::get('/', [PharmacieController::class, "index"])->name('dashboard.pharmacies');
        Route::get('/create',  [PharmacieController::class, "create"])->name('dashboard.pharmacies.create');
        Route::post('/create',  [PharmacieController::class, "store"]);
    });


    Route::prefix('maladies')->group(function () {
        Route::get('/', [MaladieController::class, "index"])->name('dashboard.maladie');
        Route::get('/{maladie}', [MaladieController::class, "view"])->name('dashboard.maladie.view');
        Route::post('/',  [MaladieController::class, "store"])->name('dashboard.maladie.store');
        Route::put('/{id}',  [MedicamentController::class, "update"])->name('dashboard.maladie.udpate');
        Route::delete('/{id}',  [MedicamentController::class, "destroy"])->name('dashboard.maladie.destroy');
    });
    Route::prefix('conseils')->group(function () {
        Route::get('/', [ConseilController::class, "index"])->name('dashboard.conseil');
        Route::post('/',  [ConseilController::class, "store"])->name('dashboard.conseil.store');
        Route::put('/{id}',  [ConseilController::class, "update"])->name('dashboard.conseil.udpate');
        Route::delete('/{id}',  [ConseilController::class, "destroy"])->name('dashboard.conseil.destroy');
    });
});




Route::prefix('/ask')->group(function () {
    Route::get('/',  [AskController::class, 'index'])->name('ask.index');
    Route::get('/not-answered',  [AskController::class, 'notAnswered'])->name('ask.notAnswered');

    Route::get('/q/{id}', [AskController::class, 'show'])->name('ask.show');
    Route::post('/q/{id}', [AskController::class, 'answer']);
    Route::post('/', [AskController::class, 'store']);
    Route::get('/u/{id}', [AskController::class, 'userQuestion'])->name('ask.user.questions');
    Route::get('/u/{id}/answers', [AskController::class, 'userAnswers'])->name('ask.user.answers');
});




Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');








Route::get('/dashboard/user', function () {
    return view('dashboard.profile');
})->name('dashboard.profile');

Route::get('/dashboard/expenses', function () {
    return view('dashboard.profile');
})->name('dashboard.expenses');



Route::get('/dashboard/support', function () {
    return view('dashboard.mailbox');
})->name('dashboard.assistance');
Route::get('/dashboard/subscriptions', function () {
    return view('dashboard.profile');
})->name('dashboard.subscriptions');

Route::get('/dashboard/sms', function () {
    return view('dashboard.sms', ["users" => UserProfile::all(['full_name', 'mobile_phone'])]);
})->name('dashboard.sms');

Route::post('/dashboard/sms', [SMSController::class, 'sendSMS']);

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/products/analyse-complete', function () {
    return view('products.page');
})->name('products.analyse');


Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::post('/login', [AuthController::class, 'create_session_from_token'])->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');
Route::get('/password-reset', function () {
    return view('auth.reset_password');
})->name('auth.reset');

Route::get('/about', function () {
    return view('about');
})->name('about');
