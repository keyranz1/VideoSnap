<?php

$app->get('/register', $guest(), function() use($app){
$app->render('auth/register.php');
})->name('register');



$app->post('/register', $guest(), function() use($app){

    $request = $app->request;

    $email = $request->post('email');

    $username = $request->post('username');

    $password = $request->post('password');

    $confirmPassword = $request->post('confirmpassword');

    $firstname = $request->post('firstname');

    $lastname = $request->post('lastname');







    $register = $app->validation;

    $register->validate([
        'email' => [$email,'required|email|uniqueEmail'],
        'username' => [$username,'required|alnumDash|max(20)|uniqueUsername'],
        'password' => [$password, 'required|min(6)'],
        'confirmPassword' => [$confirmPassword, 'required|matches(password)'],
        'firstname' => [$firstname, 'alnumDash|min(1)'],
        'lastname' => [$lastname, 'alnumDash|min(1)']


    ]);



    if($register->passes()) {
        $identifier = $app->randomlib->generateString(128);



       $user =  $app->user->create([
            'email' => $email,
            'username' => $username,
            'password' => $app->hash->password($password),
            'active' => false,
            'activeHash' => $app->hash->hash($identifier),
            'firstname' => $firstname,
           'lastname' => $lastname,


        ]);





        $app->mail->send('email/auth/registered.php', ['user' => $user, 'identifier' => $identifier], function($message)  use ($user){
                $message->to($user->email);
            $message->subject('Thanks for registering');
        });

        $app->flash('register', 'You have been registered. Please check your email to confirm.');
        $app->response->redirect($app->urlFor('introduction'));
    } else {
        $app->render('home.php');
        $app->flash('notSuccess','Could not register.');

    }







    $app->render('auth/register.php', [
        'errors' => $register->errors(),
        'request' => $request,
    ]);




})->name('register.post');