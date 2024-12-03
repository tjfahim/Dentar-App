<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all(); // Fetch all books
        return view('admin.pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.book.create'); // Show create form
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // Validate PDF
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Create a new Book model instance
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->status = $request->status == 'active' ? 1 : 0;

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            // Generate a unique file name for the PDF
            $pdfName = time() . '.' . $request->pdf->extension();

            // Store the PDF in the 'pdfs' folder in the public storage
            $request->pdf->move(public_path('pdfs'), $pdfName);

            // Save the PDF path in the database
            $book->pdf = 'pdfs/' . $pdfName;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Generate a unique file name for the image
            $imageName = time() . '.' . $request->image->extension();

            // Store the image in the 'books' folder in the public storage
            $request->image->move(public_path('images/books'), $imageName);

            // Save the image path in the database
            $book->image = 'images/books/' . $imageName;
        }

        // Save the book data into the database
        $book->save();

        // Redirect to the index route (list of books) with a success message
        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the book by its ID
        $book = Book::findOrFail($id);

        // Show the book details
        return view('admin.pages.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the book record by its ID
        $book = Book::findOrFail($id);

        // Return the edit view with the book data
        return view('admin.pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // Validate PDF
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional during update
            'status' => 'required|in:active,inactive', // Ensure valid status
        ]);

        // Find the existing book by its ID
        $book = Book::findOrFail($id);

        // Update the book's fields
        $book->title = $request->title;
        $book->description = $request->description;
        $book->status = $request->status == 'active' ? 1 : 0;

        // Handle PDF upload if a new PDF is provided
        if ($request->hasFile('pdf')) {
            // Delete the old PDF from storage if it exists
            if ($book->pdf && file_exists(public_path($book->pdf))) {
                unlink(public_path($book->pdf)); // Remove the old PDF file
            }

            // Generate a unique file name for the new PDF
            $pdfName = time() . '.' . $request->pdf->extension();

            // Store the new PDF in the 'pdfs' folder in the public storage
            $request->pdf->move(public_path('pdfs'), $pdfName);

            // Update the PDF path in the database
            $book->pdf = 'pdfs/' . $pdfName;
        }

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($book->image && file_exists(public_path($book->image))) {
                unlink(public_path($book->image)); // Remove the old image file
            }

            // Generate a unique file name for the new image
            $imageName = time() . '.' . $request->image->extension();

            // Store the new image in the 'books' folder in the public storage
            $request->image->move(public_path('images/books'), $imageName);

            // Update the image path in the database
            $book->image = 'images/books/' . $imageName;
        }

        // Save the updated book data into the database
        $book->save();

        // Redirect to the index route (list of books) with a success message
        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve the book by its ID
        $book = Book::findOrFail($id);

        // Delete the image and PDF from the server if they exist
        if (file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }
        if (file_exists(public_path($book->pdf))) {
            unlink(public_path($book->pdf));
        }

        // Delete the book from the database
        $book->delete();

        // Redirect back with a success message
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }
}
