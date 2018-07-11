<?php

$app->get('/hello/:username', $authenticated(), function($username) use($app){

    $user = $app->user->where('username' , $username)->first();
    if(!$user){
        $app->notFound();
    }




    $app->render('user/profile.php', [
        'user' => $user
    ]);



})->name('profile');