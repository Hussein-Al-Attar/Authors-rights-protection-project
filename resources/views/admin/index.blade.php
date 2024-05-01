<x-app-layout>
    @if (session('success'))
    <div class="bg-green-200 text-green-800 p-4 mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class=" m-2">
        <form action="{{ route('admin.index') }}" method="GET">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="query"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required>
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        user name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-4">
                                <form method="POST" action="{{ route('admin.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <label for="role">Role:</label>
                                    <select name="role" required>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="supervise" {{ $user->role == 'supervise' ? 'selected' : '' }}>Supervise</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    <button type="submit">Update</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  <!-- Replace the default pagination links with custom styled links -->
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-t border-gray-200">
            <!-- Custom styled pagination links -->
            <div class="flex justify-between items-center">
                <div>
                    @if ($users->onFirstPage())
                        <span class="text-gray-400">&laquo; Previous</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="text-blue-600 hover:text-blue-700">&laquo; Previous</a>
                    @endif
                </div>
                <div>
                    Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
                </div>
                <div>
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="text-blue-600 hover:text-blue-700">Next &raquo;</a>
                    @else
                        <span class="text-gray-400">Next &raquo;</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
