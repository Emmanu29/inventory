<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

Route::controller(UserController::class)->group(function(){

    // Route::get('/', function () {
    // return view('auth.index');
    // });

    Route::get('/','login')->name('login');      
    // ->middleware('guest');

    Route::post('/login/process','process');

    Route::get('/dashboard','showDashboard'); 
    
});


Route::controller(Controller::class)->group(function(){
       
});


Route::controller(ProductController::class)->group(function(){
    Route::get('/accounting','showAccounting')->name('accounting'); 
    
    Route::get('/add/accounting','addAccounting'); 

    Route::post('/add/accounting','createAccounting'); 

    Route::get('/edit/{device}','showEditAccounting')->name('edit.device');;
    
    Route::put('/edit/{device}','updateAccounting');

    Route::delete('/delete/{device}', 'destroy')->name('accounting.destroy');

    Route::get('/accounting/qr/{device}','showQr'); 

    Route::get('/download/{device}', 'download')->name('download.qr');

});
