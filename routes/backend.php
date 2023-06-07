<?php


use Illuminate\Support\Facades\Route;




Route::get('/', [\App\Http\Controllers\Backend\DashController::class,'index'])->name('dash.index');


Route::group(['prefix'=>'settings','as'=>'settings.'],function (){
    Route::get('/', [\App\Http\Controllers\Backend\SettingController::class,'index'])->name('index');
    Route::get('/{group}', [\App\Http\Controllers\Backend\SettingController::class,'group'])->name('group');
    Route::post('/', [\App\Http\Controllers\Backend\SettingController::class,'store'])->name('store');
    Route::put('/', [\App\Http\Controllers\Backend\SettingController::class,'update'])->name('update');
    Route::delete('/{setting}', [\App\Http\Controllers\Backend\SettingController::class,'destroy'])->name('destroy');
});
