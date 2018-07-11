<?php


$authenticationCheck = function($required) use($app){
    return function() use($required, $app){
        if((!$app->auth && $required) || ($app->auth && !$required)){
            $app->flash('notSuccess', 'You are not allowed in this page');
            $app->redirect($app->urlFor('introduction'));
        }
    };


};

$adminCheck = function($required) use($app){
  return function() use($required, $app){
        if(!$app->admin && $required ){
            $app->flash('notSuccess', 'You are not allowed in this page');
            $app->redirect($app->urlFor('introduction'));
        }
  };
};


$authenticated = function() use ($authenticationCheck){
    return $authenticationCheck(true);
};

$admin = function() use($adminCheck){
    return $adminCheck(true);
};

$guest = function() use ($authenticationCheck){
    return $authenticationCheck(false);
};

//$admin = function() use($app){
//  return function() use($app){
//      if(!$app->auth || !$app->auth->isAdmin()){
//            $app->redirect($app->urlFor('introduction'));
//      }
//  }  ;
//};
