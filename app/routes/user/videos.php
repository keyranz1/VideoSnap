<?php

$app->get('/hello/:username', $authenticated(), function($username) use($app){

    $user = $app->user->where('username' , $username)->first();
    if(!$user){
        $app->notFound();
    }

    $passing = $user->firstname."'s Videos";

    $uservideo =  $app->video->where('id',$user->id);


    $app->render('user/videos.php', [
        'uservideo' => $uservideo,
        'usersFullName' => $passing
    ]);



})->name('videos');