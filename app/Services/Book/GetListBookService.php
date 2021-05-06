<?php

namespace App\Services\Book;

use App\Repositories\BookRepository;

/**
 * Class GetListBookService
 *
 * @package App\Services\Book
 */
class GetListBookService
{
    /**
     * Book repository
     *
     * @var BookRepository Book Repository
     */
    protected $bookRepository;

    /**
     * BookController constructor.
     *
     * @param BookRepository $bookRepository BonusContract Repository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param array $payload
     *
     * @return mixed
     */
    public function handle(array $payload)
    {
        $book = $this->bookRepository->with('author');

        if (!empty($payload['search'])) {
            $search = trim($payload['search']);

            $book->where('title', 'LIKE', "%{$search}%");
        }

        return $book->paginate(10);
    }
}
