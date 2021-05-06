<?php

namespace App\Repositories;

use App\Models\Book;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ReaderRepository
 *
 * @package App\Repositories
 */
class BookRepository extends BaseRepository
{
    public function model()
    {
        return Book::class;
    }
}
