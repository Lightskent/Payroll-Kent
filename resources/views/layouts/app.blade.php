<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System Analytics</title>

    {{-- Bootstrap CDN (Optional for styling) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Styles (Optional) --}}
    <style>
        body {
            padding: 2rem;
            background-color: #f8f9fa;
        }
        h1, h2 {
            margin-top: 1rem;
        }
    </style>

    @yield('head') {{-- For page-specific CSS or meta tags --}}
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    {{-- Bootstrap JS (Optional if using dropdowns, modals, etc.) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts') {{-- For page-specific JavaScript like Chart.js --}}
</body>
</html>
