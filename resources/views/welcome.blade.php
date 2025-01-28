<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Recorder</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #000;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 800px;
            padding: 20px;
        }
        h1 {
            font-size: 4em;
            margin-bottom: 0.5em;
        }
        p {
            font-size: 1.5em;
            margin-bottom: 1.5em;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn:hover {
            background-color: #fff;
            color: #000;
        }
        .section {
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        .section-title {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .section-content {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .card {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
        .card img {
            max-width: 100%;
            border-radius: 10px;
        }
        .card-content {
            margin-top: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form div {
            width: 100%;
            margin-bottom: 15px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-size: 1.2em;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #fff;
            border-radius: 5px;
            background-color: transparent;
            color: #fff;
            font-size: 1em;
        }
        form button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Attendance Recorder</h1>
        <p>Experience the best way to manage and track attendance efficiently.</p>
        <a href="{{ route('login') }}" class="btn">Get Started</a>
    </div>
    
    <footer>
        <p>&copy; 2024 Attendance Recorder. All rights reserved.</p>
    </footer>
</body>
</html>