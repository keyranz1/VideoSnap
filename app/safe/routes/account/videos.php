<?php
$app->get('/video/:username',$authenticated(),function($username) use($app){


        $user = $app->user->where('username' , $username)->first();
        if(!$user){
            $app->notFound();
        }

        $app->render('videos/videos.php',[
            'user' => $user
        ]);


})->name('myvideos');

