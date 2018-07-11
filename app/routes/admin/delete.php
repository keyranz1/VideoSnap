<?php
$app->get('/commentDeleted/:id', $admin(), function($id) use($app){

    $todelete = $app->comment->where('id',$id)->first();
    $theVideo = $app->video->where('video_id',$todelete->foreign_id)->first();
    $sendName = $theVideo->video_id;
    $todelete->delete([
        'id'=>$id
    ]);
    $app->redirect($app->urlFor('individual',array('video_id' => $sendName)));

})->name('deletecomment');



$app->get('/commentDel/:id', $authenticated(), function($id) use($app){

    $todelete = $app->comment->where('id',$id)->first();
    $theVideo = $app->video->where('video_id',$todelete->foreign_id)->first();
    $sendName = $theVideo->video_id;
    $todelete->delete([
        'id'=>$id
    ]);
    $app->redirect($app->urlFor('individual',array('video_id' => $sendName)));

})->name('deletecommentifuser');