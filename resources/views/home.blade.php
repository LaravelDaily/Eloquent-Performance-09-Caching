<ul>
    @foreach ($books as $book)
        <li>{{ $book->title }}: {{ $book->books_sold ?? '0' }}</li>
    @endforeach
</ul>
