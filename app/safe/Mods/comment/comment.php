<?php


namespace Mods\comment;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Mods\user\user;

class comment extends Eloquent
{

    protected $table = 'comments';

    protected $fillable = [
        'comments',
        'foreign_id',
        'users_id',
        'username'
    ];



}