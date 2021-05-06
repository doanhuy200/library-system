<?php

namespace App\Http\Controllers;

use App\Enums\BorrowStatus;
use App\Http\Requests\Borrow\CreateBookBorrowRequest;
use App\Models\Book;
use App\Repositories\ReaderRepository;
use App\Services\Borrow\CreateBookBorrowService;
use App\Services\Borrow\GetListBookBorrowService;
use App\Services\Borrow\ListBookBorrowOverdueService;
use Illuminate\Support\Carbon;

class BorrowController extends Controller
{
    public function index(GetListBookBorrowService $bookBorrowService)
    {
        $books = $bookBorrowService->handle();

        return view('borrow.index', compact('books'));
    }

    public function create($id, ReaderRepository $readerRepository)
    {
        $readers = $readerRepository->all();
        $book = Book::findOrFail($id);

        return view('borrow.create', compact('book', 'readers'));
    }

    public function store(
        $id,
        CreateBookBorrowRequest $request,
        CreateBookBorrowService $createBookBorrowService
    ) {
        $payload = [
            'book_id' => $id,
            'reader_id' => $request->reader_id,
            'status' => BorrowStatus::IS_BORROW,
            'expired_at' => Carbon::parse($request->expired_at),
            'created_at' => Carbon::now(),
        ];

        $createBookBorrowService->handle($payload);

        return redirect()->route('borrow.index')->withFlashSuccess("Borrow book success");
    }

    public function overdue(ListBookBorrowOverdueService $overdueService)
    {
        $books = $overdueService->handle();

        return view('borrow.overdue', compact('books'));
    }

    public function returnBook($id)
    {
        $book = Book::findOrFail($id);
        $book->readers()->update(['status' => BorrowStatus::IS_RETURN]);

        return redirect()->route('borrow.overdue')->withFlashSuccess("Return book success");
    }
}
