<?php

namespace App;

use App\Exceptions\BookException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function borrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

    public function borrow(Book $book)
    {
        // cek apakah masih ada stok buku
        if ($book->stock < 1) {
            throw new BookException("Buku $book->title sedang tidak tersedia.");
        }

        // cek apakah buku ini sedang dipinjam oleh user
        if($this->borrowLogs()->where('book_id',$book->id)->where('is_returned', 0)->count() > 0 ) {
            throw new BookException("Buku $book->title sedang Anda pinjam.");
        }

        $borrowLog = BorrowLog::create(['user_id'=>$this->id, 'book_id'=>$book->id]);
        return $borrowLog;
    }

}
