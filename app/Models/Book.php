<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'user_id',
        'specialization',
        'description' ,
        'type_book',
        'department',
        'pdf',
        'published', 'reject_message'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user', 'book_id', 'user_id');
    }
}
