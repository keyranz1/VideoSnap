<?php

$app->get('/passwordReset', $guest(), function() use($app){

    $request = $app->request();

    $email = $request->get('email');

    $identifier = $request->get('identifier');

    $hashedIdentifier = $app->hash->hash($identifier);

    $user = $app->user->where('email', $email)->first();




    if(!$user){

        $app->response->redirect($app->urlFor('home'));
        $app->flash('notSuccess', 'Invalid Entry');


    }

    if(!$user->recoverHash){
        $app->response->redirect($app->urlFor('home'));
        $app->flash('notSuccess', 'Invalid Entry');


    }

    if(!$app->hash->hashCheck($user->recoverHash, $hashedIdentifier)){
     //   $app->response->redirect($app->urlFor('home'));
        $app->flash('notSuccess', 'Invalid Entry');


    }




    $app->render('auth/Password/reset.php',[
        'email' => $user->email,
        'identifier' => $identifier
    ]);




})->name('password.reset');

$app->post('/passwordReset', $guest(), function() use($app){

    $request = $app->request();

    $email = $request->get('email');

    $identifier = $request->get('identifier');

    $password = $request->post('password');
    $confirmpassword = $request->post('confirmpassword');


    $hashedIdentifier = $app->hash->hash($identifier);

    $user = $app->user->where('email', $email)->first();



    if(!$user){
        $app->response->redirect($app->urlFor('home'));
    }

    if(!$user->recoverHash){
        $app->response->redirect($app->urlFor('home'));

    }

    if(!$app->hash->hashCheck($user->recoverHash, $hashedIdentifier)){
        $app->response->redirect($app->urlFor('home'));

    }

    $register = $app->validation;

    $register->validate([
       'password' => [$password, 'required|min(6)'],
       'confirmpassword' => [$confirmpassword, 'required|matches(password)'],


    ]);

    if($register->passes()) {
        $user->update([
            'password' => $app->hash->password($password),
            'recoverHash' => null

        ]);
        $app->flash('global', 'Your password has been reset.');

        $app->response->redirect($app->urlFor('introduction'));

        $app->render('auth/password/reset.php', [
            'errors' => $register->errors(),
            'email' => $user->email,
            'identifier' => $user->identifier
        ]);
    } else {

    }



})->name('password.reset.post');