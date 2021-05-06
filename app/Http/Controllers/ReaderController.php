<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reader\CreateReaderRequest;
use App\Http\Requests\Reader\UpdateReaderRequest;
use App\Models\Reader;
use App\Repositories\ReaderRepository;

class ReaderController extends Controller
{
    public function index(ReaderRepository $readerRepository)
    {
        $readers = $readerRepository->orderBy('full_name')->paginate(10);

        return view('reader.index', compact('readers'));
    }

    public function create()
    {
        return view('reader.create');
    }

    public function store(CreateReaderRequest $request, ReaderRepository $readerRepository)
    {
        try {
            $dataCreate = [
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'age' => $request->age,
                'address' => $request->address,
            ];

            $readerRepository->create($dataCreate);

            return redirect()->route('reader.index')->withFlashSuccess('Create Reader success');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('Create Reader failed');
        }
    }

    public function edit($id)
    {
        $reader = Reader::with('books')->find($id);

        return view('reader.edit', compact('reader'));
    }

    public function update(Reader $reader, UpdateReaderRequest $request)
    {
        try {
            $dataUpdate = [
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'age' => $request->age,
                'address' => $request->address,
            ];

            $reader->update($dataUpdate);

            return redirect()->route('reader.index')->withFlashSuccess('Update Reader success');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('Create Reader failed');
        }
    }
}
