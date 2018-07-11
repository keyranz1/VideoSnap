<?php


$app->get('/update', $authenticated, function() use($app){
    $app->render('account/update.php');
})->name('account');


$app->post('/update', $authenticated, function() use($app){

    $request = $app->request();
    $email = $request->post('email');
    $firstname = $request->post('firstname');
    $lastname = $request->post('lastname');


    $value = $app->validation;

    $value->validate([
       'email' => [$email, 'email|uniqueEmail'],
        'firstname' => [$firstname, 'alpha|max(50)'],

    ]);

    $app->render('home.php');
})->name('account.post');