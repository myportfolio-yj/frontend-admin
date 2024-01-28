<!DOCTYPE html>
<html lang="en">
<head>
    <title>Qrvet - @yield('tittle')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e8dfc9bde8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ url('/static/css/connect.css?v='.time()) }}">
</head>
<body>
@section('content')

@show
</body>
</html>
