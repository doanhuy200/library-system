<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'author_id',
        'title',
        'languages',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
