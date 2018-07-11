<?php


namespace Mods\user;

use Illuminate\Database\Eloquent\Model as Eloquent;

class permission extends Eloquent{

    protected $table = 'permissions';

    protected $fillable = [
        'is'
    ];


    public static $defaults=[
        'is_admin' => false
    ];


}