<?php
$app->get('/tags/:name', function($name) use ($app){

    var_dump($name);
    $tags = $app->video->where($name,true);


    $app->render('tags/tags.php',[
        'tag' => $tags
    ]);

})->name('tags');

