<x-app-layout>
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <!-- Replace the default pagination links with custom styled links -->

    <!-- Button to navigate to supervised books page -->
    <div class="mt-4">
        <a href="{{ route('supervised-books.index') }}" class="text-blue-700 hover:underline">View Supervised Books</a>
    </div>

    <ul>
        @forelse($booksToReview as $book)
            <li
                class="m-2 block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $book->title }}
                </h5>
                <form method="POST" action="{{ route('supervisor.reject', $book->id) }}">
                    @csrf
                    <div class="mb-6">
                        <label
                            for="reject_message"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <input type="text" name="reject_message" required
                            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reject</button>
                </form>
                <form method="POST" action="{{ route('supervisor.publish', $book->id) }}">
                    @csrf
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Publish</button>
                </form>
                <!-- Button to view book details -->
                <a href="{{ route('books.show', $book->id) }}" class="text-blue-700 hover:underline">View Details</a>
            </li>
        @empty
            <p>No books to review.</p>
        @endforelse
    </ul>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-t border-gray-200">
                <!-- Custom styled pagination links -->
                <div class="flex justify-between items-center">
                    <div>
                        @if ($booksToReview->onFirstPage())
                            <span class="text-gray-400">&laquo; Previous</span>
                        @else
                            <a href="{{ $booksToReview->previousPageUrl() }}"
                                class="text-blue-600 hover:text-blue-700">&laquo; Previous</a>
                        @endif
                    </div>
                    <div>
                        Page {{ $booksToReview->currentPage() }} of {{ $booksToReview->lastPage() }}
                    </div>
                    <div>
                        @if ($booksToReview->hasMorePages())
                            <a href="{{ $booksToReview->nextPageUrl() }}" class="text-blue-600 hover:text-blue-700">Next
                                &raquo;</a>
                        @else
                            <span class="text-gray-400">Next &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
