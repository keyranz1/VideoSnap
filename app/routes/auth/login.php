<?php

use Carbon\Carbon;

$app->get('/login', $guest(), function() use ($app){

    $app->render('auth/login.php');

})->name('login');

$app->post('/login', $guest(),function() use($app){



    $request = $app->request;

    $identifier = $request->post('identifier');
    $password = $request->post('password');
    $remember = $request->post('remember');
    $value = $app->validation;




    $value->validate([
        'identifier' => [$identifier,'required'],
        'password' => [$password, 'required']
    ]);

    if($value->passes()){
            $user = $app->user
                ->where('active',true)
                ->where('username', $identifier)
                ->first();




        if($user && $app->hash->passwordCheck($password, $user->password))
        {

            $_SESSION[$app->config->get('auth.session')] = $user->id;



        if($remember == 'on')
        {
            $rememberIdentifier = $app->randomlib->generateString(128);
            $rememberToken = $app->randomlib->generateString(128);

            $user->updateRememberCredentials(
                $rememberIdentifier, $app->hash->hash($rememberToken)
            );


            $app->setCookie(
                $app->config->get('auth.remember'),
                "{$rememberIdentifier}___{$rememberToken}",
                Carbon::parse('+1 day')->timestamp
            );
        }
            

            $app->flash('global', 'Welcome ');

            $app->response->redirect($app->urlFor('introduction'));


        }
        else {
            $app->flash('notSuccess','Could not log you in');
            $app->response->redirect($app->urlFor('introduction'));
        }
    }


    $app->render('auth/login.php', [
           'errors' => $value->errors(),
            'request' => $request
        ]);

})->name('login.post');
