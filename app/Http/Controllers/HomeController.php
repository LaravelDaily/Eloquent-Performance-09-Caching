<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = cache()->remember('top_books', 60*60*24, function() {
            return Book::join('book_order', 'books.id', '=', 'book_order.book_id')
                ->join('orders', 'book_order.order_id', '=', 'orders.id')
                ->whereRaw('orders.created_at BETWEEN "' . now()->subDays(30)->format('Y-m-d H:i:s') . '"
                AND "' . now()->format('Y-m-d H:i:s') . '"')
                ->selectRaw('books.*, SUM(book_order.quantity) AS books_sold')
                ->groupBy('books.id')
                ->orderBy('books_sold', 'desc')
                ->take(10)
                ->get();
        });

        $books = Book::with('orders')->paginate(10);

        return view('home', compact('books'));
    }
}
