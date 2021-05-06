<?php

namespace App\Repositories;

use App\Models\Reader;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ReaderRepository
 *
 * @package App\Repositories
 */
class ReaderRepository extends BaseRepository
{
    public function model()
    {
        return Reader::class;
    }
}
