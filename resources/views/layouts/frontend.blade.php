<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

    </head>
    <body>
        <div>
            @yield('content')
        </div>

        //<script src="{{ asset('frontend/js/bootstrap5.bundle.js') }}"></script>
        //<script src="{{ asset('frontend/js/bootstrapmin.js') }}"></script>
        //<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    </body>
</html>
