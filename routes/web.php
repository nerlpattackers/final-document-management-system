<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministrativeOrderController;
use App\Http\Controllers\EndorsementController;
use App\Http\Controllers\MemorandumController;


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
// GET - Request a resource
// POST - Create a new resource
// PUT - Update a resource
// PATCH - Modify a resource
// DELETE - Delete a resource
// OPTIONS - Ask the server which verbs are allowed

//Route::get('/url_na_redirect', [pangalan_ng_controller::class, 'pangalan_ng_function_ng_controller'])->name('gustong_pangalan_ng_route');

Auth::routes();

// DELETE EXISTING CATEGORY
Route::delete('/incoming_documents/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

// UPDATE EXISTING CATEGORY
Route::put('/incoming_documents/update/{id}', [CategoryController::class, 'updateCategory']);
Route::put('/outgoing_documents/update/{id}', [CategoryController::class, 'updateCategory']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard']);
// VIEW INCOMING.INDEX
Route::get('/incoming_documents', [CategoryController::class, 'incomingIndex']);
// ADD NEW INCOMING CATEGORY TO DATABASE
Route::post('/incoming_documents/add', [CategoryController::class, 'addCategory']);

// VIEW OUTGOING.INDEX
Route::get('/outgoing_documents', [CategoryController::class, 'outgoingIndex']);
// ADD NEW OUTGOING CATEGORY TO DATABASE
Route::post('/outgoing_documents/add', [CategoryController::class, 'addCategory']);


// DISPLAY ALL INCOMING DOCUMENTS ACCORDING TO CATEGORY
Route::get('/incoming_documents/{id}', [DocumentController::class, 'display']);
// ADD NEW DOCUMENT
Route::post('/incoming_documents/{id}/add', [DocumentController::class, 'create']);
// UPDATE EXISTING DOCUMENT
Route::put('/incoming_documents/{id}/update', [DocumentController::class, 'update']);
// DELETE EXISTING DOCUMENT
Route::delete('/incoming_documents/{id}/delete', [DocumentController::class, 'delete']);
// VIEW DOCUMENT
Route::get('/incoming_documents/{id}/view', [DocumentController::class, 'view']);


// DISPLAY ALL OUTGOING DOCUMENTS ACCORDING TO CATEGORY
Route::get('/outgoing_documents/{id}', [DocumentController::class, 'displayOutgoing']);
// ADD NEW DOCUMENT
Route::post('/outgoing_documents/{id}/add', [DocumentController::class, 'create']);
// UPDATE EXISTING DOCUMENT
Route::put('/outgoing_documents/{id}/update', [DocumentController::class, 'update']);
// DELETE EXISTING DOCUMENT
Route::delete('/outgoing_documents/{id}/delete', [DocumentController::class, 'delete']);
// VIEW DOCUMENT
Route::get('/outgoing_documents/{id}/view', [DocumentController::class, 'viewOutgoing']);

// BACKUP DATABASE
Route::get('/export', [HomeController::class, 'exportDatabase']);
Route::post('/import', [HomeController::class, 'importDatabase']);











// user routes and authentication
Route::middleware('auth')->group(function () {
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
