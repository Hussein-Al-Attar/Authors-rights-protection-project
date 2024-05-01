<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-xl mx-auto">
            <form action="{{ route('books.search') }}" method="GET"
                class="flex items-center bg-gray-100 rounded-lg overflow-hidden mb-8">
                <input type="text" name="query" value="{{ $searchTerm }}"
                    class="w-full px-4 py-2 text-sm text-gray-900 bg-transparent border-0 focus:outline-none"
                    placeholder="Search for books...">
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Search</button>
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($books as $book)
                <div class="bg-gray-100 border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-gray-200 px-4 py-2">{{ $book->title }}</div>
                    <div class="px-4 py-2">
                        <ul class="text-sm text-gray-600 mt-2">
                            @foreach ($book->users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                        <p class="text-sm text-gray-600 mt-2">Description: {{ $book->description }}</p>
                        <p class="text-sm text-gray-600">Type: {{ $book->type_book }}</p>
                        <p class="text-sm text-gray-600">Department: {{ $book->department }}</p>
                        <p class="text-sm text-gray-600">Specialization: {{ $book->specialization }}</p>
                    </div>
                    <div class="px-4 py-2 flex justify-end">
                        <a href="{{ route('books.by_user', $book) }}"
                            class="inline-block px-4 py-2 text-sm font-semibold text-blue-600 hover:text-blue-700 focus:outline-none">View
                            Book</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center mt-8 col-span-3">No books found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
