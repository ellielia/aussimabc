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

Route::get('/', function (){
    return redirect()->route('news.index');
});

Route::prefix('news')->group(function () {
    Route::get('/', 'PageController@index')->name('news.index');
    Route::get('/more', 'PageController@other')->name('news.other');
    Route::get('/emergency', 'PageController@emergency')->name('news.emergency');
    Route::get('/elections', 'ElectionsController@index')->name('elections.index');
    Route::get('/elections/federal/{slug}', 'ElectionsController@federalElectionIndex')->name('elections.federal.index');
    Route::get('/elections/federal/{slug}/retiringmps', 'ElectionsController@retiringmps')->name('elections.federal.retiringmps');
    Route::get('/elections/federal/{slug}/guide/electorates', 'ElectionsController@electoratesIndex')->name('elections.federal.electorates');
    Route::get('/elections/federal/{slug}/guide/candidates', 'ElectionsController@candidatesIndex')->name('elections.federal.candidates');

    Route::get('/elections/federal/{slug}/guide/electorates/{eslug}', 'ElectionsController@electorate')->name('elections.federal.electorate');
    Route::get('/elections/federal/{slug}/partybars', 'ElectionsController@federalElectionPartyBars')->name('elections.federal.partybars');
    Route::get('/elections/byelection/{slug}', 'ElectionsController@byElectionIndex')->name('elections.byelection.index');
    Route::get('/elections/byelection/{slug}/json', function($slug) {
        $be = \App\ByElection::where('slug', $slug)->firstOrFail();
        return $be->toJson(JSON_PRETTY_PRINT);
    });
    Route::get('/elections/byelection/{slug}/json/candidates', function($slug) {
        $be = \App\ByElection::where('slug', $slug)->firstOrFail();
        $c = \App\ByElectionCandidate::where('by_election_id', $be->id)->get();
        return $c->toJson(JSON_PRETTY_PRINT);
    });

    Route::get('{category}', 'PageController@category')->name('news.category');
    Route::get('{category_id}/{article_id}', function ($category_id, $article_id) {
        abort(301, 'This article has moved URLs. Please find it using the search function.');
    })->where('category_id', '[0-9]+')->where('article_id', '[0-9]+');
    Route::get('{date}/{article}', 'PageController@articleView')->name('news.article');
});








Route::get('/admin/slug/all', function () {
    \App\Article::get()->each(function ($a) {
       $a->slug = \Illuminate\Support\Str::slug($a->title);
       $a->save();
    });

    \App\ArticleCategory::get()->each(function ($c) {
        $c->slug = \Illuminate\Support\Str::slug($c->title);
        $c->save();
    });

    \App\ByElection::get()->each(function ($c) {
        $c->slug = \Illuminate\Support\Str::slug($c->title);
        $c->save();
    });

    \App\FederalElection::get()->each(function ($c) {
        $c->slug = \Illuminate\Support\Str::slug($c->title);
        $c->save();
    });

    \App\Electorate::get()->each(function ($c) {
        $c->slug = \Illuminate\Support\Str::slug($c->title);
        $c->save();
    });
});

//Admin routes
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin/category/add', 'AdminController@addCategory')->name('admin.category.add')->middleware('journalist');
Route::get('/admin/article/view/{id}', 'AdminController@viewArticle')->name('admin.article.view')->middleware('journalist');
Route::post('/admin/article/view/{id}', 'AdminController@editArticle')->name('admin.article.edit')->middleware('journalist');
Route::view('/admin/article/write', 'admin.writearticle')->name('admin.article.write')->middleware('journalist');
Route::post('/admin/article/write', 'AdminController@publishArticle')->name('admin.article.publish')->middleware('journalist');
Route::get('/admin/article/{id}/json', 'AdminController@articleJson')->name('admin.article.json')->middleware('journalist');
Route::get('/admin/article/{id}/pdf', 'AdminController@articlePdf')->name('admin.article.pdf')->middleware('journalist');
Route::view('/admin/tweet', 'admin.tweet')->name('admim.tweet')->middleware('can_tweet');
Route::view('/admin/tweet/past', 'admin.pasttweets')->name('admim.pasttweets')->middleware('can_tweet');
Route::post('/admin/tweet/send', 'AdminController@tweet')->name('admin.tweet.send')->middleware('can_tweet');
Route::get('/admin/elections', 'AdminController@electionsIndex')->name('admin.elections.index')->middleware('journalist');
Route::get('/admin/auth/reddit/login', function () {
   return \Laravel\Socialite\Facades\Socialite::with('reddit')->redirect();
})->name('auth.reddit.login');

Route::get('/admin/auth/reddit/callback', function () {
    $return = \Laravel\Socialite\Facades\Socialite::driver('reddit')->user();
    $users = \App\User::where(['username' => $return->getNickname()])->first();
    if($users){
        Auth::login($users);
        return redirect()->route('admin.index')->with('success', 'Welcome back, '. $users->username.'!');
    }else {
        $user = \App\User::create([
            'username' => $return->getNickname(),
            'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(25)),
            'reddit' => true,
            'banned' => false,
            'journalist' => false,
            'can_tweet' => false,
            'administrator' => false
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('admin.index');
    }
});



Auth::routes(['register' => false]);
