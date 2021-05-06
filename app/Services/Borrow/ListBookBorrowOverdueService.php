<?php

namespace App\Services\Borrow;

use App\Enums\BorrowStatus;
use App\Repositories\BookRepository;
use Illuminate\Support\Carbon;

/**
 * Class CreateBookBorrowService
 *
 * @package App\Services\Book
 */
class ListBookBorrowOverdueService
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
        $book = $this->bookRepository->whereHas('readers', function ($query) {
            $query->where('status', BorrowStatus::IS_BORROW)
                ->where('expired_at', '<', Carbon::now());
        });

        return $book->paginate(10);
    }
}
