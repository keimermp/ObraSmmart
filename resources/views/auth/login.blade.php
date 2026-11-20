<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ICONO DE OBRASMART --}}
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon.png') }}?v=5">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}?v=5">

    <title>Iniciar sesión | ObraSmart</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #1e3a8a,
                    #2563eb
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            background: white;

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 30px 70px rgba(0,0,0,0.25);
        }

        /* =========================
           LADO IZQUIERDO
        ========================= */

        .login-info {
            background:
                linear-gradient(
                    150deg,
                    #1d4ed8,
                    #2563eb,
                    #3b82f6
                );

            color: white;

            padding: 55px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 40px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;

            background: white;

            color: #2563eb;

            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 26px;
        }

        .brand h1 {
            font-size: 27px;
        }

        .login-info h2 {
            font-size: 38px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .login-info p {
            color: #dbeafe;
            line-height: 1.7;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 15px;
            color: #eff6ff;
        }

        .info-icon {
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================
           FORMULARIO
        ========================= */

        .login-form {
            padding: 55px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
            font-size: 30px;
            color: #172033;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .field input:focus {
            border-color: #2563eb;
            box-shadow:
                0 0 0 3px rgba(37,99,235,0.12);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .remember input {
            width: 16px;
            height: 16px;
        }

        .forgot {
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot a {
            color: #2563eb;
            font-size: 14px;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .button {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
            font-size: 14px;
        }

        .register-link a {
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 800px) {

            .login-container {
                grid-template-columns: 1fr;
            }

            .login-info {
                padding: 35px;
            }

            .login-info h2 {
                font-size: 30px;
            }

            .login-form {
                padding: 35px;
            }

        }

        @media(max-width: 500px) {

            body {
                padding: 15px;
            }

            .login-info {
                padding: 30px;
            }

            .login-form {
                padding: 30px;
            }

        }

    </style>

</head>

<body>

<div class="login-container">

    <!-- INFORMACIÓN -->

    <div class="login-info">

        <div class="brand">

            <div class="brand-icon">
                🏗️
            </div>

            <h1>
                ObraSmart
            </h1>

        </div>

        <h2>
            Bienvenido de nuevo
        </h2>

        <p>
            Ingresa a tu cuenta para administrar tus proyectos,
            realizar estimaciones y consultar tus presupuestos.
        </p>

        <div class="info-item">

            <div class="info-icon">
                🧱
            </div>

            <span>
                Estimación de materiales
            </span>

        </div>

        <div class="info-item">

            <div class="info-icon">
                👷
            </div>

            <span>
                Cálculo de mano de obra
            </span>

        </div>

        <div class="info-item">

            <div class="info-icon">
                📊
            </div>

            <span>
                Presupuestos y estimaciones
            </span>

        </div>

    </div>

    <!-- FORMULARIO -->

    <div class="login-form">

        <h2>
            Iniciar sesión
        </h2>

        <p class="subtitle">
            Accede a tu cuenta de ObraSmart
        </p>

        @if ($errors->any())

            <div class="error">

                <ul style="padding-left: 18px;">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->

            <div class="field">

                <label for="email">
                    Correo electrónico
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="correo@ejemplo.com"
                >

            </div>

            <!-- PASSWORD -->

            <div class="field">

                <label for="password">
                    Contraseña
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Ingresa tu contraseña"
                >

            </div>

            <!-- RECORDAR -->

            <label class="remember">

                <input
                    type="checkbox"
                    name="remember"
                >

                <span>
                    Recordarme
                </span>

            </label>

            <!-- RECUPERAR -->

            @if (Route::has('password.request'))

                <div class="forgot">

                    <a
                        href="{{ route('password.request') }}"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>

                </div>

            @endif

            <!-- BOTÓN -->

            <button
                type="submit"
                class="button"
            >
                Iniciar sesión
            </button>

        </form>

        <!-- REGISTRO -->

        @if (Route::has('register'))

            <div class="register-link">

                ¿No tienes una cuenta?

                <a href="{{ route('register') }}">
                    Regístrate aquí
                </a>

            </div>

        @endif

    </div>

</div>

</body>

</html>