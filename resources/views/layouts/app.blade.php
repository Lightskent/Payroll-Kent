<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System Analytics</title>

    <!-- Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Custom Styles -->
    <style>
        body {
            padding: 2rem;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        h1, h2 {
            font-weight: bold;
            color: #2c3e50;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        h2 {
            font-size: 2rem;
            color: #2980b9;
            margin-top: 2rem;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            color: #34495e;
        }

        .table {
            margin-top: 1.5rem;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-dark {
            background-color: #2c3e50;
            color: #fff;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-primary:hover {
            background-color: #3498db;
            border-color: #3498db;
        }

        /* Responsive chart container */
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
        }
    </style>

    @yield('head') <!-- For page-specific CSS or meta tags -->
</head>
<body>

    <div class="container">
        <!-- Page content goes here -->
        @yield('content')
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts') <!-- For page-specific JavaScript like Chart.js -->
</body>
</html>
