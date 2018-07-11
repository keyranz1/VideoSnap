<?php

$app->get('/contactUs', function() use($app){

    $app->render('EmailUs/EmailUs.php');

})->name('contactUs');

$app->post('/contactUs', function() use($app){
    $stuffs = $app->request;
    if($app->auth){
    $details = "The email address is: ". $app->auth->email . ".";
        } else {
        $newEmail = $stuffs->post('email');
        $details = "The email address is: ". $newEmail . ".";
    }

    $goat = $stuffs->post('messages');

    $subj = $stuffs->post('subject');
    $fi = $subj . "";
    $user= $app->auth;

    if($app->mail->sendAnother($details. $goat, [], function($message)  use ($user) {
        $message->to('reportVideoSnap@gmail.com');
        $message->subject('Reports');
    }
    )){

    }
    $app->flash('ContactUs','Sent');
    $app->response->redirect($app->urlFor('introduction'));

})->name('contactUs.post');