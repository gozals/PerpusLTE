<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'display_name', 'description', 'route'];

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
}
