<?php

namespace App\Repositories;

use App\Models\Author;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ReaderRepository
 *
 * @package App\Repositories
 */
class AuthorRepository extends BaseRepository
{
    public function model()
    {
        return Author::class;
    }
}
