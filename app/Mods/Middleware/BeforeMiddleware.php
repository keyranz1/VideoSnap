<?php

namespace Mods\Middleware;
use Slim\Middleware;

class BeforeMiddleware extends Middleware {

    public function call () {
        $this->app->hook('slim.before', [$this, 'run']);

        $this->next->call();
    }

    public function run() {
        if (isset($_SESSION[$this->app->config->get('auth.session')])) {
            $this->app->auth = $this->app->user->where('ID', $_SESSION[$this->app->config->get('auth.session')])->first();
            $this->app->admin = $this->app->user->where('ID', $_SESSION[$this->app->config->get('auth.session')])->where('isAdmin',true)->first();

        }

        if(isset($_SESSION[$this->app->config->get('videoauth.pathauth')]) && isset($_SESSION[$this->app->config->get('auth.session')])){
            $alternate = $this->app->user->where('ID',$_SESSION[$this->app->config->get('auth.session')])->first();
            $another = $this->app->video->where('id',$alternate->id);
            $this->app->vid = $another;
        }



        $this->app->com;
        $everthing = $this->app->video;
        $this->app->everything = $everthing;
        $all = $this->app->video;



        $this->RememberMe();

        $this->app->view()->appendData([
            'auth' => $this->app->auth,
            'vid'=> $this->app->vid,
            'everything' => $this->app->everything,
            'com' => $this->app->com,
            'everyAdmin' => $this->app->admin,
            'all' =>  $this->app->video,
            'baseUrl' => $this->app->config->get('app.url')

        ]);


    }

    protected function RememberMe(){
        if($this->app->getCookie($this->app->config->get('auth.remember')) && !$this->app->auth){
           $data = $this->app->getCookie($this->app->config->get('auth.remember'));
            $credentials = explode('___',$data);


            if(empty(trim($data)) || count($credentials) !== 2){
                $this->app->response->redirect($this->app->urlFor('home'));
            } else {
                $identifier = $credentials[0];
                $token = $this->app->hash->hash($credentials[1]);

                $user = $this->app->user->where('rememberIdentifier',$identifier)
                    ->first();

                if($user){
                    if($this->app->hash->hashCheck($token, $user->rememberToken)){
                        $_SESSION[$this->app->config->get('auth.session')] = $user->id;
                        $this->app->auth = $this->app->user->where('id', $user->id)->first();
                    } else {
                        $user->removeRememberCredentials();
                    }
                }
            }
        }
    }

}