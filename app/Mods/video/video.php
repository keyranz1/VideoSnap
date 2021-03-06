<?php


namespace Mods\video;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Mods\user\user;

class video extends Eloquent
{

    protected $table = 'videos';

    protected $fillable = [
        'path',
        'id',
        'name',
        'sports',
        'educational',
        'funny',
        'number',
        'details',
        'others',
        'username',
        'views'
    ];

    public function check(){
        return $this->app->everything;
    }

}