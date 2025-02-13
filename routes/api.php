<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectAttributeController;


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RESTfulCRUD\UserController;
use App\Http\Controllers\Api\RESTfulCRUD\RESTfulProjectController;
use App\Http\Controllers\Api\RESTfulCRUD\TimesheetController;
use App\Http\Controllers\Api\RESTfulCRUD\RESTfulAttributeController;
use App\Http\Controllers\Api\RESTfulCRUD\AttributeValueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes using passport
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Set attributes for projects
    Route::post('/projects/{project}/attributes', [ProjectAttributeController::class, 'setAttributes']);

    // Get project attributes
    Route::get('/projects/{project}/attributes', [ProjectAttributeController::class, 'getProjectAttributes']);

    // Filter projects by attribute values
    Route::get('/projects/filter', [ProjectAttributeController::class, 'filterProjects']);

    // RESTful CRUD
    Route::apiResource('users', UserController::class);
    Route::apiResource('projects', RESTfulProjectController::class);
    Route::apiResource('timesheets', TimesheetController::class);
    Route::apiResource('attributes', RESTfulAttributeController::class);
    Route::apiResource('attribute-values', AttributeValueController::class);

    
});
