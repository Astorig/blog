<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script>
        let userId = {{ auth()->id() }};
    </script>
    <title>Homework Laravel</title>
</head>

<body>
    @include('layout.header')
    <main role="main" class="flex">
        <div class="row">
            @yield('content')
        </div>
        @section('sidebar')
            @include('layout.sidebar')
        @show
    </main>

    @include('layout.footer')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>

