<?php

namespace App\Services\Borrow;

use App\Repositories\BookRepository;

/**
 * Class CreateBookBorrowService
 *
 * @package App\Services\Book
 */
class CreateBookBorrowService
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
     * @return mixed
     */
    public function handle(array $payload)
    {
        $bookId = $payload['book_id'];

        $this->bookRepository->readers()->attach($bookId, $payload);

        return;
    }
}
