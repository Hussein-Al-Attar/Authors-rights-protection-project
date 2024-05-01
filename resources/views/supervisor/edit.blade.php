<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-6">Edit Book: {{ $book->title }}</h1>

                <form method="POST" action="{{ route('supervisor.update', $book->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                        <p class="mt-1 text-sm text-gray-500">{{ $book->title }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="published" class="flex items-center">
                            <input type="checkbox" name="published" id="published"
                                {{ $book->published ? 'checked' : '' }} class="mr-2">
                            <span class="text-sm font-medium text-gray-700">Publish Status</span>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="reject_message" class="block text-sm font-medium text-gray-700">Rejection
                            Message:</label>
                        <input type="text" name="reject_message" id="reject_message" value="{{ old('reject_message', $book->reject_message) }}"
                            required
                            class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
