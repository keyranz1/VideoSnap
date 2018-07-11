<?php

$app->get('/pchange' , $authenticated(), function() use ($app){
    $app->render('auth/Password/change.php');
})->name('passwordChange');

$app->post('/pchange', $authenticated(), function() use($app){
    $request = $app->request;

    $previousPassword = $app->request->post('previouspassword');
    $password = $app->request->post('password');
    $confirmPassword = $app->request->post('ConfirmPassword');

    $check = $app->validation;


    $check->validate([
        'previous_Password' => [$previousPassword,'required|matchesCurrentPassword'],
        'password' => [$password,'required|min(6)'],
        'password_confirm' => [$confirmPassword, 'required|matches(password)']
    ]);


    if($check->passes()){
        $user= $app->auth;
        $user->update([
            'password' => $app->hash->password($password)

        ]);
        $app->mail->send('Email/auth/Password/passwordChange.php', [], function($message) use($user){
           $message->to($user->email);
            $message->subject('Password Changed.');
        });
        $app->flash('global', 'Password Changed');
        $app->response->redirect($app->urlFor('introduction'));

    } else {

        $app->flash('notSuccess', 'Process Failed. Try again');

    }

    $app->render('auth/Password/change.php', [
        'errors' => $check->errors()
    ]);


})->name('passwordChangePost');