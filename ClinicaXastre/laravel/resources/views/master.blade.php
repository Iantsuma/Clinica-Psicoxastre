<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
    <style>
        .login-btn {
            background-color: #007bff;
            color: white;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .btn-quatro {
            background: linear-gradient(to right, #4bb543, #32CD32);
            color: white;
        }

        .btn-quatro:hover {
            background: linear-gradient(to right, #32CD32, #4bb543);
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            background-color: #fff;
        }

        .login-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            max-width: 600px;
        }

        .login-btn-center {
            padding: 15px 30px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn-center:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        @auth
            <nav class="nav-buttons">
                <a href="{{ url()->previous() }}" class="btn btn-quatro rounded-md px-3 py-2 text-white">
                    Voltar
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-btn rounded-md px-3 py-2 text-white">
                        Logout
                    </button>
                </form>
            </nav>
        @endauth
    @endif

    <div id="app">
        @yield('content')
    </div>
</body>
</html>
