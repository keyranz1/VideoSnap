<?php

$app->get('/other/:name', function($name) use($app){
    $user = $app->user->where('username',$name)->first();


    $app->render('/other/other.php',[
       'user' => $user
    ]);
})->name('other');