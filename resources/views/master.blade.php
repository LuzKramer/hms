<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>

    <title>HMS</title>


</head>

<body>
    <header>
        header
        <h1><a href="">suka</a></h1>
        <h2><a href="{{route('blocks.create')}}">test</a></h2>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <h1>footer</h1>
    </footer>

</body>

</html>
