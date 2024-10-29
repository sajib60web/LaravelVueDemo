<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TimeHelper;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('upload.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5120', // Limit file size to 5MB
        ]);
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['path' => Storage::url($path)], 200);
    }
}
