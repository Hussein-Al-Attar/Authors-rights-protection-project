<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('published', true)->get();
        $searchTerm = null;
        return view('books.index', compact('books', 'searchTerm'));
    }
    public function show($id)
    {
        // Fetch the book from the database
        $book = Book::findOrFail($id);

        // Pass the book to the view
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = user::all();
        return view('books.add', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $bookData = $request->validate([
            'title' => 'required|max:255',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'description' => 'required',
            'type_book' => 'required',
            'department' => 'required',
            'specialization' => 'required',
            'pdf' => 'required|mimes:pdf,docx|max:2048',
        ]);
        $pdfPath = $request->file('pdf')->store('public/pdf');
        //dd($pdfPath);
        $bookData['pdf'] = $pdfPath;
        $book = new Book($bookData);
        $book->save();
        $users = $request->input('user_ids', []);
        $book->users()->attach($users);
        return redirect()->back()->with('success', 'Book added successfully.');
    }
    public function download($id)
    {
        $book = Book::findOrFail($id);
        $pdfPath = $book->pdf;
        return Storage::download($pdfPath);
    }
    public function edit($id)
    {
        // Fetch the book from the database
        $book = Book::findOrFail($id);

        // Pass the book to the edit view
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type_book' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // Update validation rule for PDF
        ]);

        // Fetch the book
        $book = Book::findOrFail($id);

        // If a new PDF file is uploaded, delete the old one and save the new one
        if ($request->hasFile('pdf')) {
            // Delete the old PDF file if it exists
            if ($book->pdf) {
                Storage::delete($book->pdf);
            }

            // Store the new PDF file and update the 'pdf' attribute
            $pdfPath = $request->file('pdf')->store('public/pdf');
            $book->pdf = $pdfPath; // Update the 'pdf' attribute of the book model
        }

        // Set published attribute to false
        $book->published = false;

        // Update the book details
        $book->update($request->only(['title', 'description', 'type_book', 'department', 'specialization']));

        // Redirect back with a success message
        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully.');
    }



    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        // Search for books by title, description, author's name, type_book, department, specialization, and published status
        $books = Book::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('users', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhere('type_book', 'like', '%' . $searchTerm . '%')
            ->orWhere('department', 'like', '%' . $searchTerm . '%')
            ->orWhere('specialization', 'like', '%' . $searchTerm . '%')
            ->orWhere('published', $searchTerm == 'published')
            ->get();

        return view('books.index', compact('books', 'searchTerm'));
    }

    public function destroy(string $id)
    {
        // Find the book by ID
        $book = Book::findOrFail($id);

        // Delete the PDF file from storage
        if ($book->pdf) {
            Storage::delete($book->pdf);
        }

        // Delete the book record from the database
        $book->delete();

        // Redirect back with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function showByUser(Book $book)
    {
        return view('books.by_user', compact('book'));
    }
    public function Law()
    {
        return view('books.law');
    }
}
