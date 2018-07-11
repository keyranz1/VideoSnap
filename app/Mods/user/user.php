<?php


namespace Mods\user;

use Illuminate\Database\Eloquent\Model as Eloquent;

class user extends Eloquent{

    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'active',
        'activeHash',
        'recoverHash',
        'rememberIdentifier',
        'rememberToken',
        'isAdmin'
];

   public function validate_uniqueEmail($value, $input, $args, $user){
       $user = $this->user->where('email',$value);

       return ! (bool) $user->count();
   }


    public function getFullName(){

        if(!$this->firstname || !$this->lastname){
            return null;
        }

        return "{$this->firstname } {$this->lastname}";

    }

    public function getId(){
       return $this->id;
    }

    public function getFullNameOrUsername(){
        return $this->getFullName() ?: $this->username;
    }


    public function activateAccount()
    {
        $this->update(['active' => true, 'activeHash' => null]);
        $this->save();
    }


    public function updateRememberCredentials($identifier,$token){
        $this->update([
            'rememberIdentifier' => $identifier,
            'rememberToken' => $token
        ]);
    }

    public function removeRememberCredentials(){
        $this->updateRememberCredentials(null,null);
    }

    public function hasPermission($permission){
        return (bool) $this->permissions->{$permission};
    }

    public function isAdmin(){
        return $this->hasPermission('is_admin');
    }


    public function permissions(){
        return $this->hasOne('Mods\user\permission','user_id');
    }



}