<?php

$app->get('/hello/:username', $authenticated(), function($username) use($app){

    $user = $app->user->where('username' , $username)->first();
    if(!$user){
        $app->notFound();
    }




    $app->render('user/videos.php', [
        'user' => $user
    ]);



})->name('videos');