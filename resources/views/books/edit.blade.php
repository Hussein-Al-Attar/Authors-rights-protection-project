<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title -->
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" value="{{ $book->title }}" autocomplete="title" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="grid grid-cols-6 gap-6 mt-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ $book->description }}</textarea>
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="grid grid-cols-6 gap-6 mt-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="type_book" class="block text-sm font-medium text-gray-700">Type</label>
                                        <select name="type_book" id="type_book" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option value="book" {{ $book->type_book == 'book' ? 'selected' : '' }}>Book</option>
                                            <option value="research" {{ $book->type_book == 'research' ? 'selected' : '' }}>Research</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Department -->
                                <div class="grid grid-cols-6 gap-6 mt-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                                        <input type="text" name="department" id="department" value="{{ $book->department }}" autocomplete="department" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <!-- Specialization -->
                                <div class="grid grid-cols-6 gap-6 mt-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                                        <input type="text" name="specialization" id="specialization" value="{{ $book->specialization }}" autocomplete="specialization" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <!-- Upload PDF -->
                                <div class="grid grid-cols-6 gap-6 mt-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="pdf" class="block text-sm font-medium text-gray-700">Upload PDF</label>
                                        <input type="file" name="pdf" id="pdf" accept=".pdf" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
