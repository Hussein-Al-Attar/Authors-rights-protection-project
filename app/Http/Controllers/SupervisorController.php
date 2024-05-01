<?php
// SupervisorController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $booksToReview = Book::where('published', false)
            ->orWhereNull('published')
            ->paginate(5); // Adjust the number as needed

        return view('supervisor.index', compact('booksToReview'));
    }

    public function publish(Book $book)
    {
        $book->update(['published' => true]);

        return redirect()->route('supervisor.index')->with('success', "Book '{$book->title}' has been published successfully.");
    }

    public function reject(Request $request, Book $book)
    {
        $request->validate([
            'reject_message' => 'required|string',
        ]);

        $book->update([
            'published' => false,
            'reject_message' => $request->input('reject_message'),
        ]);

        return redirect()->route('supervisor.index')->with('success', "Book '{$book->title}' has been rejected successfully.");
    }

    public function edit(Book $book)
    {
        // You can add logic to handle the edit view for the supervised book
        return view('supervisor.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'published' => 'boolean',
            'reject_message' => 'required|string',
        ]);

        $book->update([
            'published' => $request->input('published'),
            'reject_message' => $request->input('reject_message'),
        ]);

        return redirect()->route('supervisor.index')->with('success', "Book '{$book->title}' has been updated successfully.");
    }
    public function showSupervisedBooks()
    {
        $supervisedBooks = Book::paginate(10);
        return view('supervisor.supervised_books', compact('supervisedBooks'));
    }
}
