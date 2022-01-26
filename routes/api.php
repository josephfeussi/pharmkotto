<?php

use App\Http\Controllers\Api\ApiAnswerController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiCarnetController;
use App\Http\Controllers\Api\ApiConseilController;
use App\Http\Controllers\Api\ApiGardeController;
use App\Http\Controllers\Api\ApiInformationController;
use App\Http\Controllers\Api\ApiMaladieController;
use App\Http\Controllers\Api\ApiMedicamentController;
use App\Http\Controllers\Api\ApiMessageController;
use App\Http\Controllers\Api\ApiPosologieController;
use App\Http\Controllers\Api\ApiProfileController;
use App\Http\Controllers\Api\ApiQuestionController;
use App\Http\Controllers\Api\ApiUsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PharmacieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('informations')->group(function () {
    Route::get('/', [InformationController::class, 'all']);
    Route::post('/store', [InformationController::class, 'apiStore']);
    Route::put('/{id}', [InformationController::class, 'apiUpdate']);
    Route::delete('/{id}', [InformationController::class, 'apiDelete']);
});

Route::prefix('pharmacies')->group(function () {
    Route::get('/', [PharmacieController::class, 'all']);
    Route::post('/store', [PharmacieController::class, 'apiStore']);
    Route::put('/{id}', [PharmacieController::class, 'apiUpdate']);
    Route::delete('/{id}', [PharmacieController::class, 'apiDelete']);
});



Route::prefix('faqs')->group(function () {
    Route::get('/', [FAQController::class, 'all']);
    Route::post('/store', [FAQController::class, 'apiStore']);
    Route::put('/{id}', [FAQController::class, 'apiUpdate']);
    Route::delete('/{id}', [FAQController::class, 'apiDelete']);
});





Route::group(['middleware' => ['json.response']], function () {
    Route::prefix('questions')->group(function () {
        Route::get('/user/{user}', [ApiQuestionController::class, 'user']);
    });
    Route::apiResource('questions', ApiQuestionController::class);


    Route::prefix('answers')->group(function () {
        Route::get('/user/{user}', [ApiAnswerController::class, 'user']);
        Route::get('/question/{question}', [ApiAnswerController::class, 'question']);
    });
    Route::apiResource('answers', ApiAnswerController::class);

    Route::prefix('maladies')->group(function () {
        Route::get('/user/{user}', [ApiMaladieController::class, 'user']);
        Route::get('/{malady}/users', [ApiMaladieController::class, 'users']);
        Route::post('/users/attach', [ApiMaladieController::class, 'attach_maladie_to_user']);
        Route::post('/users/detach', [ApiMaladieController::class, 'detach_maladie_to_user']);
    });
    Route::apiResource('maladies', ApiMaladieController::class);


    Route::prefix('conseils')->group(function () {
        Route::get('/maladie/{maladie}', [ApiConseilController::class, 'maladie']);
        Route::get('/{conseil}/maladies', [ApiConseilController::class, 'maladies']);
        Route::post('/maladie/attach', [ApiConseilController::class, 'attach_conseil_to_maladie']);
        Route::post('/maladie/detach', [ApiConseilController::class, 'detach_conseil_to_maladie']);
    });
    Route::apiResource('conseils', ApiConseilController::class);


    Route::prefix('posologies')->group(function () {
        Route::get('/medicament/{medicament}', [ApiPosologieController::class, 'medicament']);
    });
    Route::apiResource('posologies', ApiPosologieController::class);


    Route::prefix('carnets')->group(function () {
        Route::get('/user/me', [ApiCarnetController::class, 'me']);
        Route::get('/user/{user}', [ApiCarnetController::class, 'user']);
    });

    Route::apiResource('carnets', ApiCarnetController::class);

    Route::prefix('profiles')->group(function () {
        Route::get('/user/{user}', [ApiProfileController::class, 'user']);
    });
    Route::apiResource('profiles', ApiProfileController::class);

    Route::group(['middleware' => ['auth:api'], 'prefix' => 'users'], function () {
        Route::get('me', [ApiUsersController::class, 'me']);
    });
    Route::apiResource('users', ApiUsersController::class);


    Route::apiResource('gardes', ApiGardeController::class);
    Route::apiResource('information', ApiInformationController::class);
    Route::apiResource('medicaments', ApiMedicamentController::class);
    Route::apiResource('message', ApiMessageController::class);


    Route::prefix('auth')->group(function () {
        Route::post('login', [ApiAuthController::class, 'authenticate']);
        Route::post('revoke', [ApiAuthController::class, 'revoke'])->middleware('api');
    });



 });
