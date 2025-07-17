<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password - NSSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            background-image: url('{{ asset('IMG/background.jpg') }}'); /* Misma imagen de fondo que el login */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .forgot-password-container {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 380px; /* Ancho similar al contenedor de login original, puedes ajustarlo */
            max-width: 90%;
            display: flex; /* Para centrar el contenido y los elementos internos */
            flex-direction: column; /* Apilar elementos verticalmente */
            align-items: center; /* Centrar horizontalmente los elementos */
        }

        .forgot-password-logo {
            margin-bottom: 20px;
        }

        .forgot-password-logo img {
            width: 150px; /* Tamaño del logo */
            height: auto;
        }

        .forgot-password-logo h2 {
            font-size: 1.2em;
            color: #333;
            margin-top: 10px;
        }

        .description-text {
            color: #555;
            font-size: 0.95em;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .status-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box; /* Incluir padding y borde en el ancho */
        }

        .input-group {
            margin-bottom: 25px;
            width: 100%; /* Asegura que ocupe todo el ancho disponible del contenedor */
            position: relative;
        }

        .input-group input {
            width: calc(100% - 20px); /* Ancho del input con padding, sin icono de ojo */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 0.9em;
            outline: none;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            text-align: left; /* Asegura que el texto comience a la izquierda */
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85em;
            margin-top: 5px;
            text-align: left;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background-color: #ff8c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .submit-button:hover {
            background-color: #e67e00;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="forgot-password-logo">
            <img src="{{ asset('IMG/LOGO_SF.png') }}" alt="NSSP Logo">
            <h2>NAUTICAL SHIELD <br> SECURITY & ALL SERVICES</h2>
        </div>

        <div class="description-text">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" style="width: 100%;">
            @csrf

            <div class="input-group">
                {{-- <label for="email" class="input-label">Email</label> --}} <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-button">
                {{ __('Email Password Reset Link') }}
            </button>
        </form>
    </div>
</body>
</html>