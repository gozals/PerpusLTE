<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description', 'level'];

    public function permissions(){
        //return $this->belongsToMany('App\Models\Permission', 'permission_role', 'role_id', 'permission_id');
        return $this->belongsToMany('App\Models\Permission');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
