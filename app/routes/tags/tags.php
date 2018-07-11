<?php
$app->get('/tags/:name', function($name) use ($app){



    if($name == 'all'){
        $tags = $app->video;
    }else {
        $tags = $app->video->where($name,true);
    }
    $app->render('tags/tags.php',[
        'tag' => $tags,
        'type' => $name
    ]);

})->name('tags');

