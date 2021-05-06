<?php

namespace App\Services\Borrow;

use App\Enums\BorrowStatus;
use App\Repositories\BookRepository;

/**
 * Class GetListBookBorrowService
 *
 * @package App\Services\Book
 */
class GetListBookBorrowService
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
    public function handle()
    {
        $book = $this->bookRepository->whereDoesntHave('readers')
            ->orWhereHas('readers', function ($query) {
                $query->where('status', BorrowStatus::IS_RETURN);
            });

        return $book->paginate(10);
    }
}
