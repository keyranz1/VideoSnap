<?php


namespace Mods\likes;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Mods\user\user;

class likes extends Eloquent
{

    protected $table = 'likes';

    protected $fillable = [
        'users_id',
        'video_id',
        'isViewed'
    ];



}