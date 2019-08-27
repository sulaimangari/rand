<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('auth/login');
})->name('login');

Auth::routes();
Route::get('/', [
    'as' => 'signin.azure',
    'uses' => 'Auth\LoginController@redirectToProvider'
]);
Route::get('/auth/callback', [
    'as' => 'authorize.azure',
    'uses' => 'Auth\LoginController@handleProviderCallback'
]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/notif', 'HomeController@sendNotification')->name('notif');

Route::group(['prefix' => 'user'], function () {
    Route::get('/home', [
        'as' => 'homeUser',
        'uses' => 'UserController@homeUser'
    ]);

    Route::get('/device', [
        'as' => 'deviceUser',
        'uses' => 'UserController@deviceUser'
    ]);

    Route::get('/ticket', [
        'as' => 'ticketUser',
        'uses' => 'UserController@ticketUser'
    ]);
});


Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'ticket'], function () {
        Route::get('/create', [
            'as' => 'createTicket',
            'uses' => 'TicketController@createTicket'
        ]);

        Route::post('/create/store', [
            'as' => 'storeTicket',
            'uses' => 'TicketController@storeTicket'
        ]);

        Route::get('/table', [
            'as' => 'listTicket',
            'uses' => 'TicketController@listTicket'
        ])->middleware('role:admin');

        Route::delete('/destroy', [
            'as' => 'destroyTicket',
            'uses' => 'TicketController@destroyTicket'
        ])->middleware('role:admin');

        Route::get('/edit/{id}', [
            'as' => 'editTicket',
            'uses' => 'TicketController@editTicket'
        ])->middleware('role:admin');

        Route::post('/update', [
            'as' => 'updateTicket',
            'uses' => 'TicketController@updateTicket'
        ])->middleware('role:admin');

        // Route::get('/notif', [
        //     'as' => 'notifTicket',
        //     'uses' => 'TicketController@notifTicket'
        // ]);
    });

    Route::group(['prefix' => 'device', 'middleware' => ['role:admin']], function () {
        Route::get('/all', [
            'as' => 'allDevice',
            'uses' => 'DeviceController@alldevice',
        ]);

        Route::get('/available', [
            'as' => 'availableDevice',
            'uses' => 'DeviceController@availableDevice',
        ]);

        Route::get('/borrowed', [
            'as' => 'borrowedDevice',
            'uses' => 'DeviceController@borrowedDevice',
        ]);

        Route::get('/broken', [
            'as' => 'brokenDevice',
            'uses' => 'DeviceController@brokenDevice',
        ]);

        Route::get('/createDevice', [
            'as' => 'createDevice',
            'uses' => 'DeviceController@createDevice',
        ]);

        Route::post('/createDevice/store', [
            'as' => 'createDevice.store',
            'uses' => 'DeviceController@storeDevice',
        ]);

        Route::delete('/delete', [
            'as' => 'deleteDevice',
            'uses' => 'DeviceController@deleteDevice',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'editDevice',
            'uses' => 'DeviceController@editDevice',
        ]);
        Route::post('/update', [
            'as' => 'updateDevice',
            'uses' => 'DeviceController@updateDevice',
        ]);



        // borrow device
        Route::get('/DeviceBorrowed', [
            'as' => 'borrow.device.borrowed',
            'uses' => 'DeviceController@listBorrowedDevice'
        ]);

        Route::get('/DeviceReturned', [
            'as' => 'borrow.device.returned',
            'uses' => 'DeviceController@listReturnedDevice'
        ]);

        Route::get('/addBorrow', [
            'as' => 'borrow.device.new',
            'uses' => 'DeviceController@borrowDevice'
        ]);

        Route::post('/borrowBack', [
            'as' => 'borrowBack',
            'uses' => 'DeviceController@borrowBack'
        ]);

        Route::post('/saveBorrow', [
            'as' => 'device.borrow.save',
            'uses' => 'DeviceController@saveBorrowDevice'
        ]);
    });

    Route::group(['prefix' => 'permission', 'middleware' => ['role:admin']], function () {
        Route::get('/create', [
            'as' => 'createUser',
            'uses' => 'PermissionController@createUser'
        ]);

        Route::get('/list', [
            'as' => 'listUser',
            'uses' => 'PermissionController@listUser'
        ]);

        Route::get('/admin/data', [
            'as' => 'adminUser',
            'uses' => 'PermissionController@adminUser'
        ]);

        Route::post('/admin/data/store', [
            'as' => 'storeAdmin',
            'uses' => 'PermissionController@storeAdmin'
        ]);

        Route::get('/add', [
            'as' => 'addUser',
            'uses' => 'PermissionController@addUser'
        ]);

        Route::post('/add/store', [
            'as' => 'storeUser',
            'uses' => 'PermissionController@storeUser'
        ]);

        Route::delete('/delete', [
            'as' => 'destroyUser',
            'uses' => 'PermissionController@destroyUser',
        ]);
    });
});
