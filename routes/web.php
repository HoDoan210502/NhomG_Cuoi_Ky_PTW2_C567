<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\InfoController;

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

Route::get('/', [HomeController::class, 'index']);

//Danh muc san pham
Route::get('/category-list/{productid}', [CategoryController::class, 'showInHome']);
//Thuong hieu san pham
Route::get('/manu-list/{manuid}', [ManuController::class, 'showInHome']);
//Chi tiet san pham
Route::get('/detail/{spid}',[ProductController::class, 'detailProduct']);


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

//Category
Route::get('/add-product', [CategoryController::class, 'addProduct']);
Route::get('/all-product', [CategoryController::class, 'allProduct']);
Route::post('/saveproduct', [CategoryController::class, 'saveProduct']);

Route::get('/editproduct/{productid}', [CategoryController::class, 'editProduct']);
Route::post('/updateproduct/{productid}', [CategoryController::class, 'updateProduct']);

Route::get('/deleteproduct/{productid}', [CategoryController::class, 'deleteProduct']);
Route::get('/showproduct/{productid}', [CategoryController::class, 'showProduct']);
Route::get('/hideproduct/{productid}', [CategoryController::class, 'hideProduct']);
// End Category

// Manufacturer
Route::get('/add-manu', [ManuController::class, 'addManu']);
Route::get('/all-manu', [ManuController::class, 'allManu']);
Route::post('/savemanu', [ManuController::class, 'saveManu']);

Route::get('/editmanu/{manuid}', [ManuController::class, 'editManu']);
Route::post('/updatemanu/{manuid}', [ManuController::class, 'updateManu']);

Route::get('/deletemanu/{manuid}', [ManuController::class, 'deleteManu']);
Route::get('/showmanu/{manuid}', [ManuController::class, 'showManu']);
Route::get('/hidemanu/{manuid}', [ManuController::class, 'hideManu']);
// End Manufacturer

// SP
Route::get('/add-sp', [ProductController::class, 'addSP']);
Route::get('/all-sp', [ProductController::class, 'allSP']);
Route::post('/savesp', [ProductController::class, 'saveSP']);

Route::get('/editsp/{spid}', [ProductController::class, 'editSP']);
Route::post('/updatesp/{spid}', [ProductController::class, 'updateSP']);

Route::get('/deletesp/{spid}', [ProductController::class, 'deleteSP']);
Route::get('/showsp/{spid}', [ProductController::class, 'showSP']);
Route::get('/hidesp/{spid}', [ProductController::class, 'hideSP']);
// End SP

//User
Route::get('/add-user', [UserController::class, 'addUser']);
Route::get('/all-user', [UserController::class, 'allUser']);
Route::post('/saveuser', [UserController::class, 'saveUser']);

Route::get('/edituser/{userid}', [UserController::class, 'editUser']);
Route::post('/updateuser/{userid}', [UserController::class, 'updateUser']);

Route::get('/deleteuser/{userid}', [UserController::class, 'deleteUser']);
//End User




//Cart
Route::post('/to-cart',[CartController::class, 'toCart']);
Route::post('/checkout',[CheckoutController::class, 'checkout']);
//End Cart

//Search
Route::post('/search',[HomeController::class, 'search']);
//End Search

//Log_Reg
Route::get('/login_register', [UserController::class, 'login_register'])->name('login_register');
//End//

//Trans
Route::get('/add-trans', [TransController::class, 'addTrans']);
Route::get('/all-trans', [TransController::class, 'allTrans']);
Route::post('/save_trans', [TransController::class, 'saveTrans']);

Route::get('/edit_trans/{trans_id}', [TransController::class, 'editTrans']);
Route::post('/update_trans/{trans_id}', [TransController::class, 'updateTrans']);

Route::get('/delete_trans/{trans_id}', [TransController::class, 'deleteTrans']);

Route::get('/show_trans/{trans_id}', [TransController::class, 'showTrans']);
Route::get('/hide_trans/{trans_id}', [TransController::class, 'hideTrans']);
//End Trans

//Voucher
Route::get('/add-vou', [VoucherController::class, 'addVou']);
Route::get('/all-vou', [VoucherController::class, 'allVou']);
Route::post('/save_vou', [VoucherController::class, 'saveVou']);

Route::get('/edit_vou/{vou_id}', [VoucherController::class, 'editVou']);
Route::post('/update_vou/{vou_id}', [VoucherController::class, 'updateVou']);

Route::get('/delete_vou/{vou_id}', [VoucherController::class, 'deleteVou']);

Route::get('/show_vou/{vou_id}', [VoucherController::class, 'showVou']);
Route::get('/hide_vou/{vou_id}', [VoucherController::class, 'hideVou']);
//End Voucher

//Pay Method
Route::get('/add-pay', [PayController::class, 'addPay']);
Route::get('/all-pay', [PayController::class, 'allPay']);
Route::post('/save_pay', [PayController::class, 'savePay']);

Route::get('/edit_pay/{pay_id}', [PayController::class, 'editPay']);
Route::post('/update_pay/{pay_id}', [PayController::class, 'updatePay']);

Route::get('/delete_pay/{pay_id}', [PayController::class, 'deletePay']);

Route::get('/show_pay/{pay_id}', [PayController::class, 'showPay']);
Route::get('/hide_pay/{pay_id}', [PayController::class, 'hidePay']);
//End pay method

//Area
Route::get('/add-area', [AreaController::class, 'addArea']);
Route::get('/all-area', [AreaController::class, 'allArea']);
Route::post('/save_area', [AreaController::class, 'saveArea']);

Route::get('/edit_area/{area_id}', [AreaController::class, 'editArea']);
Route::post('/update_area/{area_id}', [AreaController::class, 'updateArea']);

Route::get('/delete_area/{area_id}', [AreaController::class, 'deleteArea']);

Route::get('/show_area/{area_id}', [AreaController::class, 'showArea']);
Route::get('/hide_area/{area_id}', [AreaController::class, 'hideArea']);
//End Area

//Info
Route::get('/add-info', [InfoController::class, 'addInfo']);
Route::get('/all-info', [InfoController::class, 'allInfo']);
Route::post('/save_info', [InfoController::class, 'saveInfo']);

Route::get('/edit_info/{info_id}', [InfoController::class, 'editInfo']);
Route::post('/update_info/{info_id}', [InfoController::class, 'updateInfo']);

Route::get('/delete_info/{info_id}', [InfoController::class, 'deleteInfo']);

Route::get('/show_info/{info_id}', [InfoController::class, 'showInfo']);
Route::get('/hide_info/{info_id}', [InfoController::class, 'hideInfo']);
//End Info

//Order
Route::get('/add-order', [OrderController::class, 'addOrder']);
Route::get('/all-order', [OrderController::class, 'allInfo']);
Route::post('/save_order', [OrderController::class, 'saveOrder']);

Route::get('/edit_order/{order_id}', [OrderController::class, 'editOrder']);
Route::post('/update_order/{order_id}', [OrderController::class, 'updateOrder']);

Route::get('/delete_order/{order_id}', [OrderController::class, 'deleteOrder']);

Route::get('/show_order/{order_id}', [OrderController::class, 'showOrder']);
Route::get('/hide_order/{order_id}', [OrderController::class, 'hideOrder']);
//End Order