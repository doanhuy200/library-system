<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'links',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
