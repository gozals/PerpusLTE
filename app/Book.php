<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'amount'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function borrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }
}
