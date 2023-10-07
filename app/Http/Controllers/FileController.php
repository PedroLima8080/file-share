<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function create()
    {
        return view('file.create');
    }

    public function edit($fileId)
    {
        $file = File::findOrFail($fileId);
        return view('file.edit', ['file' => $file]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required|max:100',
            'file' => 'required|file|max:2048',
        ]);

        $title = $request->get('title');
        $description = $request->get('description');
        $file = $request->file('file');

        $originalName = $file->getClientOriginalName();

        $this->fileService->add($title, $description, $file, $originalName);

        return redirect()->route('home')->with('message', 'Arquivo compartilhado com sucesso');
    }

    public function update(Request $request, $fileId)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required|max:100',
            'file' => 'sometimes|file|max:2048',
        ]);

        $title = $request->get('title');
        $description = $request->get('description');

        $file = null;
        $originalName = null;

        if($request->file('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
        }

        $this->fileService->update($title, $description, $fileId, $file, $originalName);

        return redirect()->route('home')->with('message', 'Arquivo atualizado com sucesso');
    }

    public function destroy($fileId)
    {
        $result = $this->fileService->delete($fileId);
        return redirect()->route('home')->with('message', 'Arquivo removido com sucesso');
    }

    public function downloadPrivateFile($fileId)
    {
        $file = File::findOrFail($fileId);
        return response()->download(storage_path("app/private/$file[path]"), $file['original_name']);
    }
}
