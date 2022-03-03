<?php

use App\Http\Controllers\API\CoursesController;
use App\Models\CourseCategory;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::get('courses', [CoursesController::class, 'index']);
Route::get('courses/{id}', [CoursesController::class, 'show']);
Route::get('courses/search/{title}', [CoursesController::class, 'search']);
Route::get('categories', [CoursesController::class, 'index']);
Route::get('courses/categories/{category}', function (CourseCategory $courseCategory) {

});
