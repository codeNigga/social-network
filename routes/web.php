<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{slug}', [
        'uses' => 'ProfileController@index',
        'as' => 'profile'
    ]);

    // Edit Profile
    Route::get('/profile/edit/profile', [
        'uses' => 'ProfileController@edit',
        'as' => 'profile.edit'
    ]);

    // Update profile
    Route::post('/profile/update/profile', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
    ]);
});

Route::get('/check_relationship_status/{id}', [
    'uses' => 'FriendshipsController@check',
    'as' => 'friend.check'
]);

Route::get('/add_friend/{id}', [
    'uses' => 'FriendshipsController@add_friend',
    'as' => 'friend.add_friend'
]);

Route::get('/accept_friend/{id}', [
    'uses' => 'FriendshipsController@accept_friend',
    'as' => 'friend.add_friend'
]);

Route::get('/get_unread', function () {
    return Auth::user()->unreadNotifications;
});

Route::get('/notifications', [
    'uses' => 'FriendshipsController@notifications',
    'as' => 'notifications'
]);

Route::get('/feed', [
    'uses' => 'FeedsController@feed',
    'as' => 'feed'
]);

Route::post('/create/post', [
    'uses' => 'PostsController@store',
    'as' => 'create_post'
]);

Route::get('/get_auth_user_data', function() {
    return Auth::user();
});

Route::get('/like/{id}', [
    'uses' => 'LikesController@like'
]);

Route::get('/unlike/{id}', [
    'uses' => 'LikesController@unlike'
]);

