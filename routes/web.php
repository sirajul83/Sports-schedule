<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SportsCategoryController;
use App\Http\Controllers\LeagueCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WebController;


Route::get('/', [WebController::class, 'index'])->name('web');
Route::get('/news', [WebController::class, 'index'])->name('web.news');
Route::get('/news-details/{id}/{title}', [WebController::class, 'news_details'])->name('news.details');
Route::get('/sports', [WebController::class, 'sports'])->name('sports');
Route::get('/sports-category/{name}', [WebController::class, 'sports_category'])->name('sports.category');
Route::get('/sports-date/{date}', [WebController::class, 'sports_date'])->name('sports.date');
Route::post('/sports-date-wise', [WebController::class, 'date_wise_search'])->name('sports.date_wise_search');
Route::get('/sports-date-wise', [WebController::class, 'sports'])->name('sports');
Route::get('/others-sports', [WebController::class, 'others_sports'])->name('_others_sports');
Route::get('/match-details/{id}/{title}', [WebController::class, 'match_details'])->name('match.details');
Route::get('/entertainment', [WebController::class, 'entertainment'])->name('entertainment');
Route::get('/health-tips', [WebController::class, 'health_tips'])->name('health_tips');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact-save', [WebController::class, 'contact_save'])->name('contact_save');
Route::get('/privacy-policy', [WebController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-of-service', [WebController::class, 'terms_of_service'])->name('terms_of_service');

Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard',   [DashboardController::class, 'index'])->name('dashboard');

Route::get('/event-list', [EventController::class, 'index'])->name('event.list'); 
Route::get('/event-create', [EventController::class, 'create'])->name('event.create');
Route::post('/event-store', [EventController::class, 'store'])->name('event.store');
Route::get('/event-edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event-update/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/event-delete/{id}', [EventController::class, 'destroy'])->name('event.delete');

Route::get('/team-list', [TeamController::class, 'index'])->name('team.list'); 
Route::get('/team-create', [TeamController::class, 'create'])->name('team.create');
Route::post('/team-store', [TeamController::class, 'store'])->name('team.store');
Route::get('/team-edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::post('/team-update/{id}', [TeamController::class, 'update'])->name('team.update');
Route::get('/team-delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');
Route::post('/sports-league-team-list', [TeamController::class, 'sports_league_wise_team_list'])->name('sports_league.teamlist');


// sports category
Route::get('/sports-category', [SportsCategoryController::class, 'index'])->name('setting.sports_cateory');
Route::post('/sports-category-store', [SportsCategoryController::class, 'store'])->name('setting.store_sports_cateory');
Route::get('/sports-category-edit/{id}', [SportsCategoryController::class, 'edit'])->name('setting.edit_sports_cateory');
Route::post('/sports-category-update/{id}', [SportsCategoryController::class, 'update'])->name('setting.update_sports_cateory');
Route::get('/sports-category-delete/{id}', [SportsCategoryController::class, 'destroy'])->name('setting.delete_sports_cateory');

// league catefory
Route::get('/league-category-list', [LeagueCategoryController::class, 'index'])->name('league.league_category_list');
Route::get('/league-category-create', [LeagueCategoryController::class, 'create'])->name('league.league_category_create');
Route::post('/league-category-store', [LeagueCategoryController::class, 'store'])->name('league.store_league_cateory');
Route::get('/league-category-edit/{id}', [LeagueCategoryController::class, 'edit'])->name('league.edit_league_cateory');
Route::post('/league-category-update/{id}', [LeagueCategoryController::class, 'update'])->name('league.update_league_cateory');
Route::get('/league-category-delete/{id}', [LeagueCategoryController::class, 'destroy'])->name('league.delete_league_cateory');

Route::get('/news-list',        [NewsController::class, 'index'])->name('news.list');
Route::get('/news-create',      [NewsController::class, 'create'])->name('news.create');
Route::post('/news-store',      [NewsController::class, 'store'])->name('news.store');
Route::get('/news-edit/{id}',   [NewsController::class, 'edit'])->name('news.edit');
Route::post('/news-update/{id}',[NewsController::class, 'update'])->name('news.update');
Route::get('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');
Route::post('/upload', [NewsController::class, 'uploadimage'])->name('upload');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    $output = [];
    \Artisan::call('cache:clear', $output);
    dd($output);
});