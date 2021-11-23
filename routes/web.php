<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customers;
use App\Models\Setting;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// ======== PROXY ROUTE =====//
Route::post('/proxy/popupdata','CustomersController@getdata_popup')->middleware('auth.proxy');
Route::post('/proxy','CustomersController@userlogin')->middleware('auth.proxy');
// ======== END PROXY ROUTE =====//

  //=====LOGIN ROUTE STORE ======//
Route::get('/login', function () {
    if(Auth::user()) {     
        return redirect()->route('home');
    }
    return view('login');
})->name('login');
//=====END LOGIN ROUTE STORE ======//

//=====DASHBOARD ROUTE  ======//
Route::get('/', function () {
    return view('dashboard');
})->middleware(['verify.shopify'])->name('home');
//===== END DASHBOARD SHOW ROUTE  ======//

//=====AUDIENCE LIST ROUTE WITH SHOW DATA WITHOUT CONTROLLER  ======//
Route::get('/audience_list', function () {
    $shop = auth()->user()->name;
    $customer_list_get = Customers::where(['store_name'=>$shop])->get();
    return view('audience_list',compact('customer_list_get'));
})->middleware(['verify.shopify'])->name('audience_list');
//=====END AUDIENCE LIST ROUTE  ======//

//=====SETTING LIST ROUTE WITH SHOW DATA WITHOUT CONTROLLER  ======//
Route::get('/setting', function () {
    $shop =auth()->user();
    $shop_name = auth()->user()->name;
    $page = $shop->api()->rest('GET', "/admin/api/2021-10/pages.json");
    $pages = $page['body']->container['pages'];
// dd($pages);
    $setting_customer = Setting::where(['store_name'=>$shop_name])->get()->first();
    if($setting_customer!= null){
        $setting = Setting::where(['store_name'=>$shop_name])->get()->first();
    }else{
        $setting = Setting::where(['store_name'=>'CustomerAppp'])->get()->first();
    }
    // dd( $setting);
    return view('setting',compact('setting','pages'));
})->middleware(['verify.shopify'])->name('settings');
//=====END SETTING LIST ROUTE WITH SHOW DATA WITHOUT CONTROLLER  ======//


// Route::post('/createaudiencelist','CustomersController@createaudiencelist')->middleware(['verify.shopify'])->name('createaudiencelist');

// Route::get('/getaudiencelist','CustomersController@getaudiencelist')->middleware(['verify.shopify'])->name('getaudiencelist');