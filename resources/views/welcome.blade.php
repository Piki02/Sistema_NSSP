<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - NSSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            background-image: url('{{ asset('IMG/background.jpg') }}'); /* Ruta de fondo confirmada */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px; /* Ancho más angosto para el formulario */
            max-width: 90%;
        }

        .login-logo {
            margin-bottom: 30px;
        }

        .login-logo img {
            width: 150px; /* Ajustado el tamaño del logo */
            height: auto;
        }

        .login-logo h2 {
            font-size: 1.2em;
            color: #333;
            margin-top: 10px;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative; /* Necesario para posicionar el icono del ojo */
        }

        .input-group input {
            width: calc(100% - 50px); /* Ancho del input ajustado para dejar espacio al padding y al icono */
            padding: 10px 40px 10px 10px; /* Top, Right (para el ojo), Bottom, Left (para el placeholder) */
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 0.9em;
            outline: none;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            text-align: left; /* Asegura que el texto del placeholder inicie a la izquierda */
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 0.9em;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #ff8c00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 15px; /* Espacio antes del botón de "Forgot Password" */
        }

        .login-button:hover {
            background-color: #e67e00;
        }

        .forgot-password-button {
            background: none;
            border: none;
            color: #007bff; /* Un color azul para enlaces */
            font-size: 0.9em;
            cursor: pointer;
            text-decoration: underline;
            padding: 0;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .forgot-password-button:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('IMG/LOGO_SF.png') }}" alt="NSSP Logo"> <h2>NAUTICAL SHIELD <br> SURVEY & P&I SERVICES</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="Mail" required autofocus> </div>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="password-toggle" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <button class="forgot-password-button" onclick="location.href='{{ route('password.request') }}'">Forgot your password?</button>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>