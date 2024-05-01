<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
    @include('css.nav')


</head>

<body>
    <div>
        @include('layouts.navigation')
    </div>

    <main>
        {{ $slot }}
    </main>
    @include('js.nav')
   <script src="{{ asset('../path/to/flowbite/dist/flowbite.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script> --}}
    <script>
        // Filter authors based on search input
        document.getElementById('authorSearch').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const select = document.getElementById('user_ids');
            const options = select.getElementsByTagName('option');

            for (const option of options) {
                const text = option.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>
