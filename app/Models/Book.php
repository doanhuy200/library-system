<?php

namespace App\Models;

use App\Enums\BorrowStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function readers()
    {
        return $this->belongsToMany(Reader::class, 'borrowed', 'book_id', 'reader_id')
            ->withPivot('expired_at', 'status', 'created_at', 'deleted_at');
    }

    public function getExpiredAtBorrow()
    {
        $readers = $this->readers()
            ->wherePivot('book_id', $this->getKey())
            ->wherePivot('status', BorrowStatus::IS_BORROW)
            ->wherePivot('expired_at', '<', Carbon::now())->first();

        $expiredAt = $readers->pivot->expired_at ? Carbon::parse($readers->pivot->expired_at): '';

        return $expiredAt;
    }
}
