<ul>
    @foreach ($books as $book)
        <li>{{ $book->title }}: {{ $book->books_sold }}</li>
    @endforeach
</ul>
