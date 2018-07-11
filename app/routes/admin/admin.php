<?php

$app->get('/admin', $admin(), function() use($app){

    $listUser = $app->user->where('active',true)->where('isAdmin',false);

    $listAdmin = $app->user->where('active',true)
        ->where('isAdmin',true);

    $app->render('admin/admin.php',[
        'allAdmin' => $listAdmin,
        'allUser' => $listUser
    ]);


})->name('admin');