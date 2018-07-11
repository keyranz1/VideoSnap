<?php
$app->get('/individual/:video_id', function($video_id) use($app){
    $user = $app->video->where('video_id' , $video_id)->first();

    if(!$user){
        $app->notFound();
    }
    if($app->auth) {

        $viewsNumber = $user->views;

        $hasSeen = $app->likes->where('video_id', $video_id)->where('users_id', $app->auth->id);


        if ($hasSeen->count() != 0) {

        } else {

            $newSeen = $app->likes->create([
                'video_id' => $video_id,
                'users_id' => $app->auth->id,
                'isViewed' => 1
            ]);

            $newNumber = $viewsNumber + 1;

            $user->update([
                'views' => $newNumber
            ]);


        }
    }
    if(!$user){
        $app->notFound();
    }

    $app->everything->currentPath = $user->path;
    $app->everything->currentName = $user->name;
    $app->everything->currentId = $user->video_id;
    $app->everything->educational = $user->educational;
    $app->everything->sports = $user->sports;
    $app->everything->funny = $user->funny;
    $app->everything->created_at = $user->created_at;
    $app->everything->details = $user->details;
    $app->everything->others = $user->others;
    $app->everything->views = $user->views;



    $another = $app->user->where('id',$user->id)->first();

    $app->everything->username = $another->username;




    $_SESSION[$app->config->get('videosession.session')] = $user->video_id;


    $comment = $app->comment->where('foreign_id', $user->video_id)->get();
    $app->com = $comment;

    $all = $app->video;


    $app->render('videos/individual.php',[
        'user' => $user,
        'com' => $comment,
        'all' => $all
    ]);


})->name('individual');


$app->post('/individual/:video_id', function($video_id) use($app){
    $user = null;
    $user = $app->video->where('video_id', $video_id)->first();
    $currentNumber = $user->number;


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

    if($written){
        $newNumber = $currentNumber +1;
        $app->video->where('video_id', $video_id)->update([
           'number' => $newNumber
        ]);
    }






    $comment = $app->comment->where('foreign_id', $user->video_id)->get();
    $app->com = $comment;


    $app->everything->currentPath = $user->path;
    $app->everything->currentName = $user->name;
    $app->everything->currentId = $user->video_id;
    $app->everything->educational = $user->educational;
    $app->everything->sports = $user->sports;
    $app->everything->funny = $user->funny;
    $app->everything->others = $user->others;

    $app->everything->username = $user->username;
    $app->everything->created_at = $user->created_at;
    $app->everything->details = $user->details;
    $app->everything->views = $user->views;



    $another = $app->user->where('id',$user->id)->first();


    $app->everything->username = $another->username;


    $all = $app->video;



    $app->render('videos/individual.php',[
        'user' => $user,
        'com' => $comment,
        'all' => $all

    ]);
})->name('individual.post');