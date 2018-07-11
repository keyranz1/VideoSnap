<?php
$app->get('/individual/:name', function($name) use($app){




    $user = $app->video->where('name' , $name)->first();


    if(!$user){
        $app->notFound();
    }

    $app->everything->currentPath = $user->path;
    $app->everything->currentName = $user->name;
    $app->everything->currentId = $user->video_id;

    $_SESSION[$app->config->get('videosession.session')] = $user->video_id;


    $comment = $app->comment->where('foreign_id', $user->video_id)->get();
    $app->com = $comment;


    $app->render('videos/individual.php',[
        'user' => $user,
        'com' => $comment,
    ]);


})->name('individual');


$app->post('/individual/:name', function($name) use($app){

    $user = $app->video->where('name',$name)->first();





    if(!$user){
        $app->notFound();
    }




    $request = $app->request;

    $comment = $request->post('comments');


    $written = $app->comment->create([
       'comments' => $comment,
        'foreign_id' => $user->video_id,
        'users_id' => $app->auth->id,
        'username' => $app->auth->username
    ]);





    $comment = $app->comment->where('foreign_id', $user->video_id)->get();
    $app->com = $comment;

    var_dump($user->created_at);

    $app->everything->currentPath = $user->path;
    $app->everything->currentName = $user->name;
    $app->everything->currentId = $user->video_id;
    $app->everything->created_at = $user->created_at;




    $app->render('videos/individual.php',[
        'user' => $user,
        'com' => $comment,

    ]);
})->name('individual.post');