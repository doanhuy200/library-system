<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Services\Book\GetListBookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request, GetListBookService $listBookService)
    {
        $books = $listBookService->handle($request->all());

        return view('book.index', compact('books'));
    }

    public function create(AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->all();

        return view('book.create', compact('authors'));
    }

    public function store(CreateBookRequest $request, BookRepository $bookRepository)
    {
        try {
            $dataCreate = [
                'title'     => $request->title,
                'languages' => $request->languages_book,
                'author_id' => $request->author_id,
            ];

            $bookRepository->create($dataCreate);

            return redirect()->route('book.index')->withFlashSuccess('Create Book success');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('Create Book failed');
        }
    }

    public function show($id, AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->all();
        $book = Book::with('readers')->findOrFail($id);

        return view('book.show', compact('book', 'authors'));
    }

    public function edit($id, AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->all();
        $book = Book::findOrFail($id);

        return view('book.edit', compact('book', 'authors'));
    }

    public function update($id, UpdateBookRequest $request)
    {
        try {
            $dataUpdate = [
                'title'     => $request->title,
                'languages' => $request->languages_book,
                'author_id' => $request->author_id,
            ];
            $book = Book::findOrFail($id);
            $book->update($dataUpdate);

            return redirect()->route('book.index')->withFlashSuccess('Update Book success');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('Create Book failed');
        }
    }
}
