
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Internal Events and Tasks</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Laboratory Project</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/internal-events">Internal events</a>
                <a class="nav-link" href="/tasks">Tasks</a>
            </div>
        </div>
    </nav>
    @yield ("header")
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    </div>
    @if ($errors->any())
        <div class="container">
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @yield("content")


    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
