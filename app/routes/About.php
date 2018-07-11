<?php
$app->get('/about',function() use($app){
   $app->render('about.php');
})->name('about');

$app->post('/about', function() use($app){
    $app->render('home.php');
})->name('about.post');