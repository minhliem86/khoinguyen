<?php
Route::group(['prefix' => 'admin', 'namespace' => 'App\Modules\Admin\Controllers'], function(){
  // Authentication Routes...
  Route::group(['middleware'=>['web']], function(){

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    // Change Password
    Route::post('/changePass', ['as' => 'admin.changePass.postChangePass', 'uses'=>'ProfileController@postChangePass']);

    /*ROLE, PERMISSION*/
    Route::get('/create-role', ['as' => 'admin.createRole', 'uses' => 'Auth\RoleController@createRole']);
    Route::post('/create-role', ['as' => 'admin.postCreateRole', 'uses' => 'Auth\RoleController@postCreateRole']);
    Route::post('/ajax-role', ['as' => 'admin.ajaxCreateRole', 'uses' => 'Auth\RoleController@postAjaxRole']);
    Route::post('/ajax-permission', ['as' => 'admin.ajaxCreatePermission', 'uses' => 'Auth\RoleController@postAjaxPermission']);

    Route::group(['middleware' => ['can_login']], function(){

      Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
      //   PORFILE
      Route::get('/profile', ['as' => 'admin.profile.index', 'uses' => 'ProfileController@index']);



        // MULTI PHOTOs
        Route::get('photo', ['as'=>'admin.photo.index', 'uses'=>'MultiPhotoController@getIndex']);
        Route::get('photo/create', ['as'=>'admin.photo.create', 'uses'=>'MultiPhotoController@getCreate']);
        Route::post('photo/create', ['as'=>'admin.photo.postCreate', 'uses'=>'MultiPhotoController@postCreate']);
        Route::get('photo/edit/{id}',['as' => 'admin.photo.edit', 'uses'=>'MultiPhotoController@getEdit']);
        Route::put('photo/edit/{id}',['as' => 'admin.photo.update', 'uses'=>'MultiPhotoController@postEdit']);
        Route::delete('photo/delete/{id}', ['as' => 'admin.photo.destroy', 'uses'=>'MultiPhotoController@destroy']);
        Route::post('photo/deleteAll', ['as' => 'admin.photo.deleteAll', 'uses'=>'MultiPhotoController@deleteAll']);

        /*CATEGORY*/
        Route::get('category/getData', ['as' => 'admin.category.getData', 'uses' => 'CategoryController@getData']);
        Route::post('category/deleteAll', ['as' => 'admin.category.deleteAll', 'uses' => 'CategoryController@deleteAll']);
        Route::post('category/updateStatus', ['as' => 'admin.category.updateStatus', 'uses' => 'CategoryController@updateStatus']);
        Route::post('category/postAjaxUpdateOrder', ['as' => 'admin.category.postAjaxUpdateOrder', 'uses' => 'CategoryController@postAjaxUpdateOrder']);
        Route::resource('category', 'CategoryController');

        /*PAGE*/
        Route::get('page/getData', ['as' => 'admin.page.getData', 'uses' => 'PageController@getData']);
        Route::post('page/deleteAll', ['as' => 'admin.page.deleteAll', 'uses' => 'PageController@deleteAll']);
        Route::post('page/updateStatus', ['as' => 'admin.page.updateStatus', 'uses' => 'PageController@updateStatus']);
        Route::resource('page', 'PageController');

        /* COMPANY */
        Route::any('company/{id?}', ['as' => 'admin.company.index', 'uses' => 'CompanyController@getInformation']);

        /* CONTACT */
        Route::get('contact/getData', ['as' => 'admin.contact.getData', 'uses' => 'ContactController@getData']);
        Route::post('contact/deleteAll', ['as' => 'admin.contact.deleteAll', 'uses' => 'ContactController@deleteAll']);
        Route::resource('contact', 'ContactController', [
          'only' => ['index', 'show', 'destroy'],
        ]);

        /*PRODUCT*/
        Route::get('product/getData', ['as' => 'admin.product.getData', 'uses' => 'ProductController@getData']);
        Route::post('product/deleteAll', ['as' => 'admin.product.deleteAll', 'uses' => 'ProductController@deleteAll']);
        Route::post('product/postAjaxUpdateOrder', ['as' => 'admin.product.postAjaxUpdateOrder', 'uses' => 'ProductController@postAjaxUpdateOrder']);
        Route::post('product/AjaxRemovePhoto', ['as' => 'admin.product.AjaxRemovePhoto', 'uses' => 'ProductController@AjaxRemovePhoto']);
        Route::post('product/AjaxUpdatePhoto', ['as' => 'admin.product.AjaxUpdatePhoto', 'uses' => 'ProductController@AjaxUpdatePhoto']);
        Route::post('product/updateStatus', ['as' => 'admin.product.updateStatus', 'uses' => 'ProductController@updateStatus']);
        Route::post('product/updateHotProduct', ['as' => 'admin.product.updateHotProduct', 'uses' => 'ProductController@updateHotProduct']);
        Route::resource('product', 'ProductController');

        /* MEDIA */
        Route::get('media/getData', ['as' => 'admin.media.getData', 'uses' => 'MediaController@getData']);
        Route::post('media/deleteAll', ['as' => 'admin.media.deleteAll', 'uses' => 'MediaController@deleteAll']);
        Route::post('media/updateStatus', ['as' => 'admin.media.updateStatus', 'uses' => 'MediaController@updateStatus']);
        Route::post('media/postAjaxUpdateOrder', ['as' => 'admin.media.postAjaxUpdateOrder', 'uses' => 'MediaController@postAjaxUpdateOrder']);
        Route::resource('media', 'MediaController');

        /*SUPPORT*/
        Route::get('support/getData', ['as' => 'admin.support.getData', 'uses' => 'SupportController@getData']);
        Route::post('support/deleteAll', ['as' => 'admin.support.deleteAll', 'uses' => 'SupportController@deleteAll']);
        Route::post('support/updateStatus', ['as' => 'admin.support.updateStatus', 'uses' => 'SupportController@updateStatus']);
        Route::post('support/postAjaxUpdateOrder', ['as' => 'admin.support.postAjaxUpdateOrder', 'uses' => 'SupportController@postAjaxUpdateOrder']);
        Route::resource('support', 'SupportController');
    });
  });
});
