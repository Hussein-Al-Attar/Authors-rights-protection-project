<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-semibold mb-4">Add Book</h1>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter title" required>
            </div>

            <div>
                <label for="authors" class="block font-medium">Authors:</label>
                <input type="text" id="authorSearch" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Search authors">
                <select name="user_ids[]" id="user_ids" class="w-full p-2 border border-gray-300 rounded" multiple required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="description" class="block font-medium">Description:</label>
                <textarea name="description" id="description" rows="3" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter description" required></textarea>
            </div>

            <div>
                <label for="type_book" class="block font-medium">Type:</label>
                <select name="type_book" id="type_book" class="w-full p-2 border border-gray-300 rounded">
                    <option value="book">Book</option>
                    <option value="research">Research</option>
                </select>
            </div>

            <div>
                <label for="specialization" class="block font-medium">Specialization:</label>
                <input type="text" name="specialization" id="specialization" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter specialization">
            </div>

            <div>
                <label for="department" class="block font-medium">Department:</label>
                <input type="text" name="department" id="department" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Enter department">
            </div>


             <!-- Upload PDF -->
             <div class="grid grid-cols-6 gap-6 mt-6">
                <div class="col-span-6 sm:col-span-4">
                    <label for="pdf" class="block text-sm font-medium text-gray-700">Upload PDF</label>
                    <input type="file" name="pdf" id="pdf" accept=".pdf" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

