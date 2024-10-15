<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    @vite('resources/css/app.css')  
    @yield('library-css')
    <title>Petra Airlines</title>
</head>
<body>
    @include('includes.navbar')

    <div class="w-full mb-10">
        @yield('content')
    </div>

    @include('includes.footer')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Data table -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    @vite(['resources/js/app.js'])
    @yield('library-js')
</body>
</html>