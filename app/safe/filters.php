<?php


$authenticationCheck = function($required) use($app){
    return function() use($required, $app){
        if((!$app->auth && $required) || ($app->auth && !$required)){
            $app->flash('notSuccess', 'You are not allowed in this page');
            $app->redirect($app->urlFor('introduction'));
        }
    };


};


$authenticated = function() use ($authenticationCheck){
    return $authenticationCheck(true);
};

$guest = function() use ($authenticationCheck){
    return $authenticationCheck(false);
};
