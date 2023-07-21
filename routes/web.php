<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerce;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryContoller;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthControll;
use App\Http\Controllers\CustomerOrderControll;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdminOrderControll;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MyCommerce::class,'index'])->name('home');
Route::get('/product/category/{id}',[MyCommerce::class,'category'])->name('category');
Route::get('/product/my-product',[MyCommerce::class,'product'])->name('product');
Route::get('/product/show/{id}',[MyCommerce::class,'details'])->name('product.details');
Route::get('/about',[MyCommerce::class,'about'])->name('about');
Route::get('/contact',[MyCommerce::class,'contact'])->name('contact');

Route::get('/product/cart',[CartController::class,'show'])->name('product.cart');
Route::post('/product/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/product/remove-cart-product/{id}',[CartController::class,'remove'])->name('remove-cart-product');
Route::post('/product/product-cart-update/{id}',[CartController::class,'update'])->name('product-cart-update');

Route::get('/product/checkout',[CheckoutController::class,'index'])->name('checkout.product');
Route::post('/product/new-cash-order',[CheckoutController::class,'newCashOrder'])->name('new-cash-order');
Route::get('/completed-order',[CheckoutController::class,'completedOrder'])->name('completed-order');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



Route::get('/customer/login',[CustomerAuthControll::class,'index'])->name('customer.login');
Route::post('/customer/login',[CustomerAuthControll::class,'login'])->name('customer.login');
Route::post('/customer/register',[CustomerAuthControll::class,'register'])->name('customer.register');

Route::middleware('customer')->group(function () {
    Route::get('/customer/logout',[CustomerAuthControll::class,'logout'])->name('customer.logout');
    Route::get('/customer/dashboard',[CustomerAuthControll::class,'dashboard'])->name('customer.dashboard');
    Route::get('/customer/profile',[CustomerAuthControll::class,'profile'])->name('customer.profile');
    Route::get('/customer/account',[CustomerAuthControll::class,'account'])->name('customer.account');
});



Route::get('/customer/all-order',[CustomerOrderControll::class,'allOrder'])->name('customer.all-order');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/category/add', [CategoryController::class,'index'])->name('add.category');
    Route::get('/category/manage', [CategoryController::class,'manage'])->name('manage.category');
    Route::post('/category/create', [CategoryController::class,'create'])->name('create.category');
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('edit.category');
    Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('update.category');
    Route::get('/category/delete/{id}', [CategoryController::class,'delete'])->name('delete.category');





    Route::get('/sub-category/add', [SubCategoryContoller::class,'index'])->name('add.sub-category');
    Route::get('/sub-category/manage', [SubCategoryContoller::class,'manage'])->name('manage.sub-category');
    Route::post('/sub-category/create', [SubCategoryContoller::class,'create'])->name('create.sub-category');
    Route::get('/sub-category/edit/{id}', [SubCategoryContoller::class,'edit'])->name('edit.sub-category');
    Route::post('/sub-category/update/{id}', [SubCategoryContoller::class,'update'])->name('update.sub-category');
    Route::get('/sub-category/delete/{id}', [SubCategoryContoller::class,'delete'])->name('delete.sub-category');


    Route::get('/brand/add', [BrandController::class,'index'])->name('add.brand');
    Route::get('/brand/manage', [BrandController::class,'manage'])->name('manage.brand');
    Route::post('/brand/create', [BrandController::class,'create'])->name('create.brand');
    Route::get('/brand/edit/{id}', [BrandController::class,'edit'])->name('edit.brand');
    Route::post('/brand/update/{id}', [BrandController::class,'update'])->name('update.brand');
    Route::get('/brand/delete/{id}', [BrandController::class,'delete'])->name('delete.brand');


    Route::get('/unit/add', [UnitController::class,'index'])->name('add.unit');
    Route::get('/unit/manage', [UnitController::class,'manage'])->name('manage.unit');
    Route::post('/unit/create', [UnitController::class,'create'])->name('create.unit');
    Route::get('/unit/edit/{id}', [UnitController::class,'edit'])->name('edit.unit');
    Route::post('/unit/update/{id}', [UnitController::class,'update'])->name('update.unit');
    Route::get('/unit/delete/{id}', [UnitController::class,'delete'])->name('delete.unit');


    Route::get('/product/add', [ProductController::class,'index'])->name('add.product');
    Route::get('/product/get-subcategory-by-category', [ProductController::class,'getSubcategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::get('/product/manage', [ProductController::class,'manage'])->name('manage.product');
    Route::post('/product/create', [ProductController::class,'create'])->name('create.product');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('edit.product');
    Route::get('/product/details/{id}', [ProductController::class,'details'])->name('details.product');
    Route::post('/product/update/{id}', [ProductController::class,'update'])->name('update.product');
    Route::get('/product/delete/{id}', [ProductController::class,'delete'])->name('delete.product');

    Route::get('/order/manage', [AdminOrderControll::class,'index'])->name('manage.order');
    Route::get('/order/edit/{id}', [AdminOrderControll::class,'edit'])->name('admin.edit.order');
    Route::get('/order/details/{id}', [AdminOrderControll::class,'details'])->name('admin.details.order');
    Route::get('/order/invoice/view/{id}', [AdminOrderControll::class,'invoiceView'])->name('admin.invoice.view.order');
    Route::get('/order/invoice/print/{id}', [AdminOrderControll::class,'invoicePrint'])->name('admin.invoice.print.order');
    Route::get('/order/delete/{id}', [AdminOrderControll::class,'delete'])->name('admin.delete.order');

});
