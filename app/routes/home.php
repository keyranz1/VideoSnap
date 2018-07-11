<?php
$app->get('/',function() use($app){
   $app->render('home.php');
})->name('home');



$app->get('/Welcome', function() use($app){

   $app->render('home.php');

})->name('introduction');




