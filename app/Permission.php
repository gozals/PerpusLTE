<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'display_name', 'description', 'route'];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    /**
     * @param $roleName
     *
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
    }
}
