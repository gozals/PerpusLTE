<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Author;
use App\Book;
use App\BorrowLog;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::truncate();
        BorrowLog::truncate();
        Book::truncate();

        // Sample penulis
        $author1 = Author::create(['name'=>' Andrew Hunt, David Thomas']);
        $author2 = Author::create(['name'=>'Robert C. Martin']);
        $author3 = Author::create(['name'=>'Kent Beck']);

        // Sample buku
        $book1 = Book::create(['title'=>'The Pragmatic Programmer, From Journeyman To Master ',
            'amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Clean Code: A Handbook of Agile Software Craftsmanship',
            'amount'=>2, 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'The Clean Coder: A Code of Conduct for Professional',
            'amount'=>4, 'author_id'=>$author2->id]);
        $book4 = Book::create(['title'=>'Test-Driven Development by Example',
            'amount'=>3, 'author_id'=>$author3->id]);

        // Sample peminjaman buku
        $member = User::where('email', 'member@member.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1]);
    }
}
