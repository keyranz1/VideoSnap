<?php

$app->post('/searchResults', function() use($app){

 $request = $app->request;

    $search = $request->post('search');


    $userSearch = $app->user->where('username',$search)
                            ->orWhere('firstname',$search)
                            ->orWhere('lastname',$search);



   $videoSearch = $app->video->where('name',$search);

    $app->render('/search/search.php',[
        'userSearch' => $userSearch,
        'videoSearch' => $videoSearch,
        'results' => $search
       ]);


 })->name('search');