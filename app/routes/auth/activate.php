<?php


$app->get('/activate', function() use($app) {

   $request = $app->request();

    $email = $request->get('email');


    $identifier = $request->get('identifier');

    $hashedIdentifier = $app->hash->hash($identifier);

    $user = $app->user->where('email', $email)
        ->where('active',false)
        ->first();


    if(!$user || !$app->hash->hashCheck($user->activeHash, $hashedIdentifier)){
        $app->response->redirect($app->urlFor('introduction'));
        $app->flash('notSuccess','There was a problem activating');

    } else {
        $user->activateAccount();
        $app->flash('activate','Account activated');
        $app->response->redirect($app->urlFor('introduction'));
    }
})->name('activate');