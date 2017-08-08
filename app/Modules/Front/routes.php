<?php
Route::group(['namespace'=>'App\Modules\Front\Controllers', 'middleware' => 'web'], function(){
  Route::get('/', ['as' => 'front.home', 'uses' =>'PageController@homepage']);
  Route::get('/ve-chung-toi', ['as' => 'front.about', 'uses' =>'PageController@about']);
  Route::get('/lien-he', ['as' => 'front.contact.index', 'uses' =>'ContactController@index']);
  Route::post('/lien-he', ['as' => 'front.contact.post', 'uses' =>'ContactController@postRegister']);
  Route::get('/san-pham', ['as' => 'front.product', 'uses' => 'ProductController@index']);
  Route::get('/san-pham/{slug}', ['as' => 'front.product.detail' , 'uses' => 'ProductController@getDetail'])->where('slug', '[0-9a-zA-Z./\-]+');
});
