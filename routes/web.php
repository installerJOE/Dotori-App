<?php

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

Route::get('/', function () {
    return redirect('/login');
});

// Routes for authenticated and verified users
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|-------------------------------------------------------------------------------------------------------------
| Routes for users/subscribers
|-------------------------------------------------------------------------------------------------------------
*/
Route::get('/dashboard',  [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/deposit',  [App\Http\Controllers\PagesController::class, 'deposit']);
Route::get('/deposits/history',  [App\Http\Controllers\PagesController::class, 'depositHistory']);
Route::get('/withdrawal',  [App\Http\Controllers\PagesController::class, 'withdrawal']);
Route::get('/withdrawals/history',  [App\Http\Controllers\PagesController::class, 'withdrawalHistory']);
Route::get('/packages/subscribe',  [App\Http\Controllers\PagesController::class, 'purchasePackage']);
Route::get('/packages/subscribed',  [App\Http\Controllers\PagesController::class, 'subscribedPackages']);
Route::get('/products/shop',  [App\Http\Controllers\PagesController::class, 'productShop']);
Route::get('/products/{id}/purchase',  [App\Http\Controllers\PagesController::class, 'purchaseProduct']);
Route::get('/products/order-history',  [App\Http\Controllers\PagesController::class, 'orderHistory']);

Route::get('/announcement',  [App\Http\Controllers\PagesController::class, 'announcement']);
Route::get('/referral',  [App\Http\Controllers\PagesController::class, 'referral']);
Route::get('/daily-history',  [App\Http\Controllers\PagesController::class, 'dailyHistory']);


// Get Routes for User settings
Route::get('/settings/profile',  [App\Http\Controllers\PagesController::class, 'profile']);
Route::get('/settings/password',  [App\Http\Controllers\PagesController::class, 'changePassword']);
Route::get('/settings/pin',  [App\Http\Controllers\PagesController::class, 'changePin']);

// Post Routes for user settings
Route::post('/settings/profile',  [App\Http\Controllers\SettingsController::class, 'updateProfile']);
Route::post('/settings/password',  [App\Http\Controllers\SettingsController::class, 'changePassword']);
Route::post('/settings/pin',  [App\Http\Controllers\SettingsController::class, 'changePin']);

// Post Routes for user transactions
Route::post('/transactions/deposit',  [App\Http\Controllers\TransactionsController::class, 'deposit']);
Route::post('/transactions/withdraw',  [App\Http\Controllers\TransactionsController::class, 'withdraw']);
Route::post('/package/purchase',  [App\Http\Controllers\TransactionsController::class, 'purchasePackage']);
Route::post('/package/repurchase',  [App\Http\Controllers\TransactionsController::class, 'repurchasePackage']);
Route::post('/package/cancel-subscription',  [App\Http\Controllers\TransactionsController::class, 'cancelPackageSub']);
Route::post('/products/purchase',  [App\Http\Controllers\TransactionsController::class, 'purchaseProduct']);


/*
|-------------------------------------------------------------------------------------------------------------
| Routes for administrator
|-------------------------------------------------------------------------------------------------------------
*/
Route::get('/admin/dashboard',  [App\Http\Controllers\AdminController::class, 'dashboard']);

Route::get('/admin/deposits',  [App\Http\Controllers\AdminController::class, 'deposits']);
Route::get('/admin/deposits/requests',  [App\Http\Controllers\AdminController::class, 'depositRequests']);
Route::post('/admin/deposit/validate',  [App\Http\Controllers\AdminController::class, 'validateDepositRequest']);

Route::get('/admin/withdrawals',  [App\Http\Controllers\AdminController::class, 'withdrawals']);
Route::get('/admin/withdrawals/requests',  [App\Http\Controllers\AdminController::class, 'withdrawalRequests']);
Route::post('/admin/withdrawal/validate',  [App\Http\Controllers\AdminController::class, 'validateWithdrawalRequest']);
Route::get('/admin/packages',  [App\Http\Controllers\AdminController::class, 'packages']);

Route::get('/admin/shopping-products',  [App\Http\Controllers\AdminController::class, 'shoppingProducts']);
Route::get('/admin/shopping/history',  [App\Http\Controllers\AdminController::class, 'shoppingHistory']);

Route::post('/admin/packages/store',  [App\Http\Controllers\AdminController::class, 'storePackage']);
Route::post('/admin/packages/update/{id}',  [App\Http\Controllers\AdminController::class, 'updatePackage']);

Route::post('/admin/shopping-product',  [App\Http\Controllers\AdminController::class, 'storeProduct']);
Route::post('/admin/shopping-products/{id}/update',  [App\Http\Controllers\AdminController::class, 'updateProduct']);
Route::post('/admin/shopping-products/{id}/update-status',  [App\Http\Controllers\AdminController::class, 'updateProductStatus']);

Route::get('/admin/subscribers',  [App\Http\Controllers\AdminController::class, 'subscribers']);