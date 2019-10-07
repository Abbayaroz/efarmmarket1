<?php

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
Route::get('/LogOut',[
    'uses'=>\user\AuthUser::class."@LogOut",
    'as'=>'user.LogOut',
]);
Route::get('/',[
    'uses'=>indexController::class."@landingPage",
    'as'=>"homepage"
]);
Route::get('/About Us',[
    'uses'=>indexController::class."@aboutUs",
    'as'=>"aboutUs"
]);
Route::get('/Contact/Us',[
    'uses'=>indexController::class."@contactUs",
    'as'=>"contact.info"
]);
Route::get('/search/', IndexController::class . "@search")->name('search');
Route::get('shipping-info/',\checkoutController::class."@showCheckout")->name('checkout');
Route::post('shipping-info',\checkoutController::class."@postCheckout");



Route::post('/Contact/Us',[
    'uses'=>indexController::class."@postContactUs",
    'as'=>"user.contact",
]);
Route::get('/Privacy/Policy',[
    'uses'=>indexController::class."@privacyPolicy",
    'as'=>"privacyPolicy"
]);
Route::get('/Our-Services',[
    'uses'=>indexController::class."@services",
    'as'=>"services"
]);
Route::get('/terms/condition',[
    'uses'=>indexController::class."@terms",
    'as'=>"terms"
]);
Route::get('/register',[
    'uses'=>\user\AuthController::class."@UserReg",
    'as'=>"user.register",
]);
Route::post('/register',[
    'uses'=>\user\AuthController::class."@postUserReg",
]);
Route::get('/login',[
    'uses'=>indexController::class."@landingPage",
]);
Route::post('/login',[
    'uses'=>\user\AuthController::class."@postLogin",
    'as'=>'user.login'
]);

Route::prefix('buyer')->group(function(){
    Route::get('/gallery', [
        'uses'=>\user\AuthUser::class."@buyerPage",
        'as'=>'owner.post',
    ]);
    Route::get('/messages/',[
        'uses'=>\user\AuthUser::class."@userMessages",
        "as"=>'owner.ownersMessages'

    ]);
    Route::get('/wallet',[
        'uses'=>\user\AuthUser::class."@userWallet",
        "as"=>'owner.wallet'
    ]);
});
Route::prefix('owner')->group(function() {
    Route::get('/on-five-buying', [
        'uses' => \owner\OwnerAuth::class . "@OnFiveBuying",
        'as' => "owner.onFiveBuying",
    ]);
    Route::post('/on-five-buying', [
        'uses' => \owner\OwnerAuth::class . "@postOnFiveBuying",
        'as' => "owner.onFiveBuying",
    ]);
    Route::get('/messages', [
        'uses' => \owner\OwnerAuth::class . "@ownersMessages",
        'as' => "owner.ownersMessages",
    ]);
    Route::get('/gallery', [
        'uses' => \owner\OwnerAuth::class . "@ownersPost",
        'as' => "owner.post",
    ]);
    Route::get('/profile-update', [
        'uses' => \owner\OwnerAuth::class . "@ownersProfileUpdate",
        'as' => 'owners.profileUpdate'
    ]);
    Route::post('/profile/update', [
        'uses' => \owner\AuthController2::class."@ownerUpdateProfile",
        'as' => "owner.profile.update",
    ]);
    Route::get('/sold-properties', [
        'uses' => \owner\OwnerAuth::class . "@ownersSold",
        'as' => "owner.sold",
    ]);
    Route::get('/wallet', [
        'uses' => \owner\OwnerAuth::class . "@ownersWallet",
        'as' => "owner.wallet",
    ]);
    Route::get('/upload-property', [
        'uses' => \owner\OwnerAuth::class . "@propertyReg",
    ]);
    Route::post('/upload-property', [
        'uses' => \owner\AuthController2::class . "@uploadProperty",
        'as' => "owner.property.upload",
    ]);
    Route::get('/Remove/property/{removeProperty}',\owner\OwnerAuth::class."@removeProperty")->name('remove.property');
    Route::get('/update-property', [
        'uses' => \owner\OwnerAuth::class . "@updateProperty",
        'as' => "owner.property.update",
    ]);
    Route::post('/update-property', [
        'uses' => \owner\AuthController2::class . "@ownerUpdateProfile",
        'as' => "owner.property.update",
    ]);
    Route::get('/pending/', [
        'uses' => \owner\OwnerAuth::class . "@pendingPost",
        'as' => "pending",
    ]);
    Route::post('/bank/details', [
        'uses' => \owner\BankDetails::class ."@bankDetails",
        'as' => "bank.details",

    ]);
    Route::get('/bought/{propertyId}', [
        'uses' => \owner\AuthController2::class."@getMarkBought",
        'as' => "mark.bought",
    ]);
    Route::post('/bought/{propertyId}', [
        'uses' => \owner\AuthController2::class."@postMarkBought",
        'as' => "verify.bought",
    ]);

});
Route::get('/receipt/{transactionId}', [
    'uses' => PaymentController::class . "@ownerReceipt",
    'as' => "general.receipt",
]);
Route::get('/buyerReceipt/{transactionId}', [
    'uses' => PaymentController::class . "@buyerReceipt",
    'as' => "general.buyerReceipt",
]);
Route::get('/buyerPay/{galleryId}', [
    'uses' => PaymentController::class . "@createBuyersTransaction",
    'as' => "buyerTransaction",
]);
Route::get('/payWithWallet/{mRef}', [
    'uses' => WalletController::class . "@walletPayment",
    'as' => "paywithwallet",
]);
Route::post('/payWithWallet/{mRef}', [
    'uses' => WalletController::class . "@walletPayment",
    'as' => "paywithwallet",
]);
Route::get('/payment/{transactionId}', [
    'uses' => PaymentController::class . "@payments",
    'as' => "payment",
]);
Route::post('/payment/{transactionId}', [
    'uses' => PaymentController::class . "@payments",
    'as' => "payment",
]);

Route::get('/payment/failed', \PaymentController::class . "@failedTransaction")->name('payment.failed');
Route::get('/payment/notify', \PaymentController::class . "@notifyTransaction")->name('payment.notify');
Route::get('/payment/success', \PaymentController::class . "@successfulTransaction")->name('payment.success');

Route::post('/payment/failed', \PaymentController::class . "@failedTransaction")->name('payment.failed');
Route::post('/payment/notify', \PaymentController::class . "@notifyTransaction")->name('payment.notify');
Route::post('/payment/success', \PaymentController::class . "@successfulTransaction")->name('payment.success');

Route::get('/readmore/{moreDetails}', [
    'uses' => indexController::class."@readMore",
    'as' => "readMore",
]);
Route::post('/recharge/wallet',[
   'uses'=>\WalletController::class."@create",
   'as'=>'recharge.wallet'
]);
Route::get('/wallet/Receipt/{transactionId}',[
   'uses'=>\PaymentController::class."@walletReceipt",
    'as'=>'wallet.receipt',
]);
Route::get('/owner/Details/{username}/{property}',[
    'uses'=>\owner\OwnerAuth::class."@viewOwnerDetails",
    'as'=>'owner.detail',
]);
Route::prefix('Admin')->group(function() {
    Route::get('/Login/',\Admin\AdminController::class."@getAdminLogin")->name('admin.login');
    Route::post('/Login/',\Admin\AdminController::class."@postAdminLogin");
    Route::get('/Landing/',\Admin\AdminAuth::class."@getSidebar")->name('admin.sidebar');
    Route::get('/Register/',\Admin\AdminAuth::class."@getAdminRegister")->name('admin.register');
    Route::post('/Register/',\Admin\AdminAuth::class."@postAdminRegister");
    Route::get('/statistics/',\Admin\AdminAuth::class."@getStatistics")->name('admin.statistics');
    Route::get('/all_Users/',\Admin\AdminAuth::class."@getUsersPage")->name('users.page');
    Route::get('/all_Users-verified/',\Admin\AdminAuth::class."@getUsers")->name('users');
    Route::get('/failed_transaction/',\Admin\AdminAuth::class."@getFailedTransactions")->name('failed.transactions');
    Route::post('/failed_transaction/',\Admin\AdminAuth::class."@wTran");
    Route::post('/bTran/',\Admin\PaymentController::class."@bTran")->name('btran');
    Route::post('/requery/', [
        'uses' => \Admin\PaymentController::class . "@requery",
        'as' => "requery",
    ]);
    Route::post('/advertTran/',\Admin\PaymentController::class."@advertTran")->name('advertTran');
    Route::get('/logout/',\Admin\AdminController::class."@getAdminLogout")->name('admin.logout');
    Route::get('/verify/{userId}',\Admin\AdminController::class."@verify")->name('verifyUsers');
    Route::get('/Read/{read}',\Admin\AdminController::class."@read")->name('read');
    Route::get('feedback',\Admin\AdminAuth::class."@getFeedbackPage")->name('feedback');
    Route::get('activityLog',\Admin\AdminAuth::class."@getActivityLog")->name('activityLog');
    Route::get('adminLog',\Admin\AdminAuth::class."@getAdminLog")->name('adminLog');
    Route::post('/onfive',\Admin\AdminAuth::class."@onFiveRequests")->name('onFiveReq');
    Route::post('/admin/update',\Admin\AdminAuth::class."@postAdminProfileUpdate");
    Route::get('/admin/update',\Admin\AdminAuth::class."@getAdminProfileUpdate")->name('adminProfileUpdate');
    Route::get('/charges',\Admin\AdminAuth::class."@getCharges")->name('charges');
    Route::post('/charges',\Admin\AdminAuth::class."@postCharges");
    Route::get('/admins',\Admin\AdminAuth::class."@getAllAdmins")->name('admins');
    Route::get('/remove|admin/{delete}',\Admin\AdminAuth::class."@deleteAdmin")->name('delete');
    Route::get('/Change/Status/{update}',\Admin\AdminAuth::class."@updateAdmin")->name('updateAdmin');
    Route::post('/contact_us',\Admin\AdminAuth::class."@postContact")->name('contact.us');
    Route::get('/contact_us',\Admin\AdminAuth::class."@getContact");
    Route::post('/terms/condition',\Admin\AdminAuth::class."@postFooterItems")->name('admin.footer');
    Route::get('/terms/condition',\Admin\AdminAuth::class."@getFooterItems");
});
Route::resource('/cart','CartController');

Route::get('/cart/remove/{id}','CartController@destroy')->name('cart.destroy');
Route::get('/cart/update/{id}','CartController@update')->name('cart.update');
/*
Route::get('/cart/remove/{id}',CartController::class."@destroy")->name('cart.destroy');
Route::get('/cart/update/{id}',CartController::class."@update")->name('cart.update');*/






