<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth'
], function () {
    Route::get('login', 'ActionsController@showLoginForm')->name('auth.login');
    Route::any('logout', 'ActionsController@logout')->name('auth.logout');
    Route::get('naver/redirect', 'NaverController@redirectToProvider')->name('auth.naver.redirect');
    Route::get('naver/callback', 'NaverController@handleProviderCallback')->name('auth.naver.callback');
});

Route::group([
    'namespace' => 'Certification',
    'prefix' => 'cert',
], function () {
    Route::get('/', 'HomeController@index')->name('cert.home');
    Route::get('verify', 'VerifyController@makeVerify')->name('cert.verify');
    Route::get('check', 'VerifyController@checkToken')->name('cert.check');
    Route::get('issue/activity', 'PaperController@issueActivityCertification')->name('cert.paper.activity');
    Route::get('issue/grade', 'PaperController@issueGradeCertification')->name('cert.paper.grade');
    Route::get('issue/ifatc', 'PaperController@issueIFATCCertification')->name('cert.paper.ifatc');
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['logged.in', 'admin'],
], function () {
    Route::get('/', 'DashboardController@showDashboard')->name('admin.dashboard');
});

Route::group([
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('me', 'ProfileController@index')->name('profile');
});
