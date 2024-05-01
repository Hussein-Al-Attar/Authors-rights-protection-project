<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervised Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Replace the default pagination links with custom styled links -->


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Supervised Books</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Publish Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reject Message
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($supervisedBooks as $book)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $book->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $book->published ? 'Published' : 'Not Published' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $book->reject_message ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('supervisor.edit', $book->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap">No supervised books.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-t border-gray-200">
                <!-- Custom styled pagination links -->
                <div class="flex justify-between items-center">
                    <div>
                        @if ($supervisedBooks->onFirstPage())
                            <span class="text-gray-400">&laquo; Previous</span>
                        @else
                            <a href="{{ $supervisedBooks->previousPageUrl() }}"
                                class="text-blue-600 hover:text-blue-700">&laquo; Previous</a>
                        @endif
                    </div>
                    <div>
                        Page {{ $supervisedBooks->currentPage() }} of {{ $supervisedBooks->lastPage() }}
                    </div>
                    <div>
                        @if ($supervisedBooks->hasMorePages())
                            <a href="{{ $supervisedBooks->nextPageUrl() }}"
                                class="text-blue-600 hover:text-blue-700">Next &raquo;</a>
                        @else
                            <span class="text-gray-400">Next &raquo;</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
