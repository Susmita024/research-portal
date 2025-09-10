<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <!-- Left: Dashboard -->
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>

            <!-- Right: Submit Paper -->
            @unless(Route::is('admin.research.create'))
            <a href="{{ route('admin.research.create') }}" class="btn btn-success">
                Add Paper
            </a>
            @endunless
        </div>
    </nav>

    @yield('content')
</body>

</html>