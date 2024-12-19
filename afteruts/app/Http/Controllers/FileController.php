<?php

namespace App\Http\Controllers;

use App\Models\File1; // Ensure the model name matches your file model and follows PSR-4
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Corrected the namespace for Log

class FileController extends Controller
{
    // Show the form for uploading files
    public function create()
    {
        return view('files.create'); // This should point to your file upload Blade view
    }

    // Store the uploaded file
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Adjust file types and size as needed
        ]);

        // Store the file publicly
        $path = $request->file('file')->storeAs('files', $request->file('file')->getClientOriginalName(), 'public');

        // Save file information in the database
        $file = new File1(); // Use the correct model name
        $file->nama_file = $request->file('file')->getClientOriginalName(); // Original file name
        $file->generated_nama = $request->file('file')->getClientOriginalName(); // This can be changed if needed
        $file->save();

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

    // Display the list of uploaded files
    public function index()
    {
        $files = File1::latest()->paginate(10); // Paginate files
        return view('files.index', compact('files')); // Pass the files to the index view
    }

    // Handle file download
    public function download($id)
    {
        $fileRecord = File1::find($id);
        
        if (!$fileRecord) {
            return redirect()->route('files.index')->with('error', 'File not found.');
        }

        $filePath = storage_path('app/public/files/' . $fileRecord->generated_nama);
        
        // Check if the file exists before attempting to download
        if (!file_exists($filePath)) {
            return redirect()->route('files.index')->with('error', 'File does not exist.');
        }

        Log::info('Attempting to download file with ID: ' . $id);
        return response()->download($filePath);
    }
}