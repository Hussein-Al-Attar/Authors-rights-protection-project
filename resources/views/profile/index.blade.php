<x-app-layout>
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Books</h1>
            <div class="flex space-x-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
                <a href="{{ route('profile.edit') }}">
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit Profile</button>
                </a>
            </div>
        </div>
        <div>
            <div>
                <h1 class="text-2xl font-bold">Books</h1>
            </div>
            @forelse($books as $book)
                <div class="bg-white shadow-md rounded-md p-6 mb-4">
                    <h2 class="text-xl font-bold mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $book->description }}</p>
                    <div class="grid grid-cols-2 gap-x-4 mb-4">
                        <div>
                            <p><span class="font-semibold">Type:</span> {{ $book->type_book }}</p>
                            <p><span class="font-semibold">Department:</span> {{ $book->department }}</p>
                            <p><span class="font-semibold">Specialization:</span> {{ $book->specialization }}</p>
                            <p><span class="font-semibold">Published:</span> {{ $book->published ? 'Yes' : 'No' }}</p>
                        </div>
                        <div>
                            <p><span class="font-semibold">Reject Message:</span> {{ $book->reject_message ?? 'N/A' }}
                            </p>
                            <p class="font-semibold">User(s) who own(s) this book:</p>
                            <ul>
                                @foreach ($book->users as $user)
                                    <li>{{ $user->name }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <form action="{{ route('books.edit', $book->id) }}" method="GET">
                            @csrf
                            <button type="submit"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        </form>
                        <div>
                            <a href="{{ route('books.show', $book->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                        </div>
                        <div>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No books found</p>
            @endforelse
        </div>
    </main>
</x-app-layout>
