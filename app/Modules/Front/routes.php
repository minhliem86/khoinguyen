<?php
Route::group([], function(){
  Route::get('/',function(){
    return view('Front::pages.home');
  });

  Route::get('lien-he', function(){
    return view('Front::pages.contact');
  });
});
