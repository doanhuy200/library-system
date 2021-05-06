<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    public function index(BookRepository $bookRepository)
    {
        $books = $bookRepository->with('author')->paginate(10);

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

    public function edit(Book $book, AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->all();

        return view('book.edit', compact('book', 'authors'));
    }

    public function update(Book $book, UpdateBookRequest $request)
    {
        try {
            $dataUpdate = [
                'title'     => $request->title,
                'languages' => $request->languages_book,
                'author_id' => $request->author_id,
            ];

            $book->update($dataUpdate);

            return redirect()->route('book.index')->withFlashSuccess('Update Book success');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('Create Book failed');
        }
    }
}
