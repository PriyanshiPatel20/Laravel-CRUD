<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('form', [FormController::class, 'form']); 

Route::get('show', [FormController::class, 'show']); 
Route::post('store_data', [FormController::class, 'store_data']); 
Route::post('update_data/{id}', [FormController::class, 'update_data']); 
Route::get('delete/{id}', [FormController::class, 'delete']); 
Route::get('edit/{id}', [FormController::class, 'edit']); 



?>