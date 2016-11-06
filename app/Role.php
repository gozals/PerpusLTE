<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description', 'level'];

}
