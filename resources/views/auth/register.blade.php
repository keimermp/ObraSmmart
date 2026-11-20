<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear cuenta | ObraSmart</title>


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


        .register-container {

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
           INFORMACIÓN
        ========================= */

        .register-info {

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


        .register-info h2 {

            font-size: 38px;

            line-height: 1.15;

            margin-bottom: 20px;
        }


        .register-info p {

            color: #dbeafe;

            line-height: 1.7;

            font-size: 16px;

            margin-bottom: 30px;
        }


        .benefit {

            display: flex;

            gap: 12px;

            align-items: center;

            margin-bottom: 15px;

            color: #eff6ff;
        }


        .benefit-icon {

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

        .register-form {

            padding: 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .register-form h2 {

            font-size: 30px;

            color: #172033;

            margin-bottom: 8px;
        }


        .subtitle {

            color: #64748b;

            margin-bottom: 25px;
        }


        .field {

            margin-bottom: 17px;
        }


        .field label {

            display: block;

            font-size: 14px;

            font-weight: 600;

            color: #334155;

            margin-bottom: 7px;
        }


        .field input {

            width: 100%;

            padding: 12px 14px;

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

            margin-top: 5px;
        }


        .button:hover {

            background: #1d4ed8;

            transform: translateY(-1px);
        }


        .login-link {

            text-align: center;

            margin-top: 20px;

            color: #64748b;

            font-size: 14px;
        }


        .login-link a {

            color: #2563eb;

            font-weight: 700;

            text-decoration: none;
        }


        .login-link a:hover {

            text-decoration: underline;
        }


        .error {

            background: #fee2e2;

            color: #b91c1c;

            border: 1px solid #fecaca;

            padding: 10px 12px;

            border-radius: 8px;

            font-size: 14px;

            margin-bottom: 18px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 800px) {

            .register-container {

                grid-template-columns: 1fr;

            }

            .register-info {

                padding: 35px;

            }

            .register-info h2 {

                font-size: 30px;

            }

            .register-form {

                padding: 35px;

            }

        }


        @media(max-width: 500px) {

            body {

                padding: 15px;

            }

            .register-info {

                padding: 30px;

            }

            .register-form {

                padding: 30px;

            }

        }

    </style>

</head>


<body>


<div class="register-container">


    <!-- INFORMACIÓN -->

    <div class="register-info">


        <div class="brand">

            <div class="brand-icon">
                🏗️
            </div>

            <h1>
                ObraSmart
            </h1>

        </div>


        <h2>
            Construye tus proyectos con mayor control.
        </h2>


        <p>
            Crea tu cuenta y comienza a planificar tus proyectos
            de construcción y remodelación.
        </p>


        <div class="benefit">

            <div class="benefit-icon">
                🧱
            </div>

            <span>
                Calcula materiales necesarios
            </span>

        </div>


        <div class="benefit">

            <div class="benefit-icon">
                👷
            </div>

            <span>
                Estima costos de mano de obra
            </span>

        </div>


        <div class="benefit">

            <div class="benefit-icon">
                📊
            </div>

            <span>
                Genera presupuestos preliminares
            </span>

        </div>


    </div>



    <!-- FORMULARIO -->

    <div class="register-form">


        <h2>
            Crear cuenta
        </h2>


        <p class="subtitle">
            Regístrate para comenzar a utilizar ObraSmart
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


        <form method="POST" action="{{ route('register') }}">

            @csrf


            <!-- NOMBRE -->

            <div class="field">

                <label for="name">
                    Nombre completo
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Ej. Juan Pérez"
                >

            </div>


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
                    autocomplete="new-password"
                    placeholder="Crea una contraseña"
                >

            </div>


            <!-- CONFIRMAR PASSWORD -->

            <div class="field">

                <label for="password_confirmation">
                    Confirmar contraseña
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Repite tu contraseña"
                >

            </div>


            <!-- BOTÓN -->

            <button
                type="submit"
                class="button"
            >
                Crear mi cuenta
            </button>


        </form>


        <!-- LOGIN -->

        <div class="login-link">

            ¿Ya tienes una cuenta?

            <a href="{{ route('login') }}">
                Inicia sesión
            </a>

        </div>


    </div>


</div>


</body>

</html>