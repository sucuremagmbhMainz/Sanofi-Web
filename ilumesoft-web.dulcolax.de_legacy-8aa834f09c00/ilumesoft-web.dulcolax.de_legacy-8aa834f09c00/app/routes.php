<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
View::composer('*', function($view) {
    $view->with('prefixQA', strpos(URL::to('/'), 'qa.') !== FALSE ? 'qa.' : '');
});
/* Make Laravel call the view composer whenever the master template is used */
View::composer('layouts.mobilemaster', 'MasterComposer');

// Route::when('*', 'csrf', array('post'));
Route::post('kontakt', 'ContactController@postKontakt');

Route::get('/', array('as' => 'home', 'uses' => 'PageController@home'));
Route::get('index.html', function() { return Redirect::to("/"); });
Route::get('produkte/dulcolax-zaepfchen.html', 'PageController@zapfchen');
Route::get('produkte/dulcolax-dragees.html', 'PageController@dragees');
// Route::get('produkte/dulcolax-m-balance.html', 'PageController@mbalance');
Route::get('produkte/dulcolax-np-tropfen.html', 'PageController@nptropfen');
// Route::get('produkte/dulcolax-np-kinder-tropfen.html', 'PageController@kinder');
Route::get('produkte/dulcolax-np-perlen.html', 'PageController@npperlen');
Route::get('produkte/dulcosoft-loesung.html', 'PageController@dulcosoftloesung');
Route::get('produkte/dulcosoft-pulver.html', 'PageController@dulcosoftpulver');
Route::get('laenderwebsites.html', 'PageController@countryselector');
Route::get('produkte/das-richtige-dulcolax.html', 'PageController@constipationandgasrelief');
Route::get('produkte/produktuebersicht.html', 'PageController@constipationandgasreliefcomparison');
Route::get('stuhlweichmacher.html', 'PageController@stoolsoftener');
Route::get('dulcosoft.html', 'PageController@dulcosoft');
Route::get('dulcosoft-schwangerschaft.html', 'PageController@dulcosoftpregnancy');
Route::get('verstopfung.html', 'PageController@constipationcausessymptoms');
Route::get('sitemap.html', 'PageController@sitemap');
Route::get('kontakt.html', array('as' => 'kontaktForm', 'uses' => 'PageController@kontakt'));
Route::get('bestatigung.html', array('as' => 'bestatigung', 'uses' => 'PageController@bestatigung'));
Route::get('impressum.html', 'PageController@impressum');
Route::get('datenschutz.html', 'PageController@privacy');
Route::get('nutzungsbedingungen.html', 'PageController@terms');
Route::get('wissenswartes/fragen-und-antworten.html', array('as' => 'advice', 'uses' => 'PageController@advice'));
Route::resource('pages', 'PageController');
Route::resource('register', 'RegisterController');
Route::get('dulcolax-kaufen.html', 'PageController@kaufen');
Route::get('dulcosoft-kaufen.html', 'PageController@kaufendulcosoft');
Route::get('dulcolax-kaufen/apotheken-in-der-naehe.html','PageController@pharmacyfinder');
Route::get('wissenswartes/historie.html', 'PageController@historie');
Route::get('wissenswartes/info-broschure.html', 'PageController@brochure');
Route::get('produkte/packshots.html', 'PageController@packshot');
// Route::get('pflichttext.html', 'PageController@pflichttext');
Route::get('aktueller_tv_spot.html', 'PageController@tv_spot');
Route::get('aktueller_tv_spot_dulcosoft.html', 'PageController@tv_spot_dulcosoft');
Route::get('selbsttest.html',array('as'=>'selbsttest','uses'=>'PageController@selbsttest'));


Route::get('perlen.html', 'PageController@verstopung_perlen');
Route::get('perlen-stress.html', 'PageController@verstopung_perlen_stress');
Route::get('perlen-ernaehrung.html', 'PageController@verstopung_perlen_ernaehrung');
Route::get('perlen-hormone.html', 'PageController@verstopung_perlen_hormone');
Route::get('perlen-reise.html', 'PageController@verstopung_perlen_reise');


Route::get('test-video.html', function(){
  return View::make('pages.mobile.test-video');
});

/*Route::get('aktueller_tv_spot.html', function(){
    return View::make('pages.tv_spot');
});*/

Route::get('references.html', function() {
    return Redirect::to('/');
});
