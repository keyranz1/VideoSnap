<?php


$app->get('/recover-password', $guest(), function() use($app){
    $app->render('auth/password/recover.php');
})->name('recoverpassword');

$app->post('/recover-password', $guest(), function() use($app){

    $request = $app->request();

    $email = $request->post('email');

    $value = $app->validation;

    $value->validate([
        'email' => [$email,'required|email']
    ]);

    if($value->passes()){

        $user = $app->user->where('email',$email)->first();

        if(!$user){
            $app->flash('notSuccess','Could not find user.');
            $app->response->redirect($app->urlFor('recoverpassword'));

        }else{
            $identifier = $app->randomlib->generateString(128);

            $user->update([
                'recoverHash' => $app->hash->hash($identifier)
            ]);

            $app->mail->send('email/auth/Password/Recover.php', ['user' => $user, 'identifier' => $identifier], function($message) use($user){
               $message->to($user->email);
                $message->subject('Recover');

            });

            $app->flash('global', 'Please check you email');

            $app->response->redirect($app->urlFor('introduction'));

        }



    }

    $app->render('auth/password/recover.php',[
        'errors' => $value->errors(),
        'request' => $request
    ]);


})->name('PasswordRecoverPost');