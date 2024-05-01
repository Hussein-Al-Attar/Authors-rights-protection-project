<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
                    <p class="text-gray-700">{{ $book->description }}</p>
                    <p><strong>Type:</strong> {{ $book->type_book }}</p>
                    <p><strong>Department:</strong> {{ $book->department }}</p>
                    <p><strong>Specialization:</strong> {{ $book->specialization }}</p>
                    <!-- Button to download the book -->
                    <p><strong>User(s) who own(s) this book:</strong></p>
                    <ul>
                        @foreach ($book->users as $user)
                            <li>{{ $user->name }} ({{ $user->email }})</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('books.download', $book->id) }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Download</a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
