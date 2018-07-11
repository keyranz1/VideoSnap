<?php


$app->post('/adminCreated', $admin(), function() use($app){
   $names = $app->request;


    $listUser = $app->user->where('active',true)->where('isAdmin',false);


    foreach($listUser->get() as $listUser){
        if($names->post($listUser->id))
        $currentUser = $listUser->update([
           'isAdmin' => true
        ]);
    }



    $listAdmin = $app->user->where('active',true)
        ->where('isAdmin',true);

    $listUser = $app->user->where('active',true)->where('isAdmin',false);

    $app->render('admin/admin.php',[
        'allAdmin' => $listAdmin,
        'allUser' => $listUser
    ]);




})->name('makeadmin');


$app->post('/adminDeleted',$admin(), function() use($app){
    $names = $app->request;



    $listUser = $app->user->where('active',true)->where('isAdmin',true);


    if($listUser->count() > 1) {
        foreach ($listUser->get() as $listUser) {

            if ($names->post($listUser->id))
                $currentUser = $listUser->update([
                    'isAdmin' => false
                ]);

        }
    } else {
        var_dump('Cannot Delete any Admin Anymore' );
    }


    $listAdmin = $app->user->where('active',true)
        ->where('isAdmin',true);
    $listUser = $app->user->where('active',true)->where('isAdmin',false);


    $app->render('admin/admin.php',[
        'allAdmin' => $listAdmin,
        'allUser' => $listUser
    ]);


})->name('deleteadmin');