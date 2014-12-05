<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;
    use HasRole;

    protected $fillable = array('*');

    public function corporate(){
        return $this->belongsTo('Corporate');
    }

    public function roles(){
        return $this->belongsToMany('Role','assigned_roles');
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }

}