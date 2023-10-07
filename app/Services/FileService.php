<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function list()
    {
        return File::with('user')->orderBy('created_at', 'desc')->get();
    }

    public function add($title, $description, $file, $originalName)
    {
        $fileName = uniqid() . '_' . $originalName;

        Storage::disk('private')->put($fileName, file_get_contents($file));

        return File::create([
            'title' => $title,
            'description' => $description,
            'user_id' => Auth::user()['id'],
            'path' => $fileName,
            'original_name' => $originalName,
        ]);
    }

    public function update($title, $description, $fileId, $file, $originalName)
    {
        $existingFile = File::findOrFail($fileId);
        $fileName = '';

        if($file) {
            Storage::disk('private')->delete($existingFile->path);
            $fileName = uniqid() . '_' . $originalName;
            Storage::disk('private')->put($fileName, file_get_contents($file));
        }

        $updateData = [
            'title' => $title,
            'description' => $description
        ];

        if($file) {
            $updateData['path'] = $fileName;
            $updateData['original_name'] = $originalName;
        }

        $existingFile->update($updateData);

        return $existingFile;
    }

    public function delete($fileId)
    {
        $file = File::findOrFail($fileId);

        Storage::disk('private')->delete($file->path);
        $file->delete();

        return true;
    }
}
