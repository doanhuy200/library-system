<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $table = 'readers';

    protected $fillable = [
        'full_name',
        'gender',
        'age',
        'address',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
