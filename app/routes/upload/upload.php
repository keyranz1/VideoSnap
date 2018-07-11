<?php

$app->get('/upload',$authenticated(),function() use($app){
   $app->render('upload/upload.php');
})->name('upload');

$app->post('/upload',$authenticated(), function() use($app){

    $request = $app->request();
    $title = $request->post('name');
    $funny = $request->post('funny');
    $educational = $request->post('educational');
    $others = $request->post('others');

    $sports = $request->post('sports');
    $description = $request->post('description');

    if($educational){
        $educational = true;
    }

    if($funny){
        $funny = true;
    }

    if($sports){
        $sports = true;
    }

    if($others){
        $others = true;
    }


    if($educational == null && $sports == null && $funny == null){
        $others = true;
    }


    $alternate = $app->user->where('ID', $_SESSION[$app->config->get('auth.session')])->first();


    if(!file_exists('C:\xampp\htdocs\VidSnapTest\videos\\'.$alternate->username)){
      mkdir('C:\xampp\htdocs\VidSnapTest\videos\\'.$alternate->username, 0700);

    }


    $toStore = new \Upload\Storage\FileSystem('C:\xampp\htdocs\VidSnapTest\videos\\'.$alternate->username);




    $file = new \Upload\File('video',$toStore);

    $filefileName = uniqid();
    $file->setName($filefileName);


    $file->addValidations(array(
       new \Upload\Validation\Mimetype('video/mp4'),
        new \Upload\Validation\Size('10G')

    ));


    $data = array(
        'name'       => $file->getNameWithExtension(),
        'extension'  => $file->getExtension(),
        'mime'       => $file->getMimetype(),
        'size'       => $file->getSize(),
        'md5'        => $file->getMd5(),
        'dimensions' => $file->getDimensions()
    );

    $user = $app->video->create([
        'name' => $title,
        'id' => $alternate->id,
        'path' => 'VidSnapTest\videos\\'.$alternate->username.'\\'.$filefileName.'.mp4',
        'funny' => $funny,
        'educational' => $educational,
        'sports' => $sports,
        'details' => $description,
        'others' => $others,
        'username' => $alternate->username
    ]);




    try {


        if(!$file->getErrors()){
            $file->upload();
            $_SESSION[$app->config->get('videoauth.pathauth')] = 'C:\xampp\htdocs\VidSnapTest\videos\\'.$alternate->username.'\\'.$filefileName;

            $app->flash('upload','Upload Complete');

            $app->response->redirect($app->urlFor('myvideos',array('username' => $alternate->username)));
        } else {
            $app->flash('notSuccess', $file->getErrors());
            $app->response->redirect($app->urlFor('upload'));
        }




    } catch (\Exception $e) {

        $errors = $file->getErrors();
    }


})->name('upload.post');