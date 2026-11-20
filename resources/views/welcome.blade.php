<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ObraSmart | Estimación de construcción</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 25px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            font-size: 25px;
            font-weight: 800;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #ffffff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav a {
            text-decoration: none;
            color: white;
            padding: 11px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav .login {
            border: 1px solid rgba(255,255,255,0.5);
        }

        .nav .login:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav .register {
            background: white;
            color: #1d4ed8;
        }

        .nav .register:hover {
            transform: translateY(-2px);
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 680px;
            padding: 150px 7% 80px;

            background:
                linear-gradient(
                    135deg,
                    #0f172a 0%,
                    #1e3a8a 55%,
                    #2563eb 100%
                );

            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            top: -200px;
            right: -100px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            bottom: -150px;
            left: -100px;
        }

        .hero-content {
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 1.1fr 0.9fr;

            align-items: center;
            gap: 70px;

            position: relative;
            z-index: 2;
        }

        .hero-text {
            color: white;
        }

        .tag {
            display: inline-block;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1.05;
            margin-bottom: 22px;
            font-weight: 800;
        }

        .hero h1 span {
            color: #93c5fd;
        }

        .hero p {
            max-width: 620px;
            font-size: 18px;
            line-height: 1.7;
            color: #dbeafe;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 25px;
            background: white;
            color: #1d4ed8;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            display: inline-block;
            padding: 14px 25px;
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
        }


        /* =========================
           TARJETA DERECHA
        ========================= */

        .hero-card {
            background: rgba(255,255,255,0.96);
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
        }

        .hero-card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .card-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
        }

        .hero-card h3 {
            font-size: 21px;
        }

        .hero-card-header p {
            color: #64748b;
            font-size: 14px;
            margin-top: 3px;
        }

        .estimate-box {
            background: #f8fafc;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 12px;
            border: 1px solid #e2e8f0;
        }

        .estimate-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .estimate-row:last-child {
            margin-bottom: 0;
        }

        .estimate-label {
            color: #64748b;
            font-size: 14px;
        }

        .estimate-value {
            font-weight: 700;
            color: #172033;
        }

        .total {
            margin-top: 18px;
            padding: 18px;
            border-radius: 14px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total span:first-child {
            font-weight: 600;
        }

        .total strong {
            color: #2563eb;
            font-size: 22px;
        }


        /* =========================
           CARACTERÍSTICAS
        ========================= */

        .features {
            padding: 80px 7%;
            background: #f8fafc;
        }

        .section-title {
            text-align: center;
            max-width: 700px;
            margin: auto;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #64748b;
            line-height: 1.6;
        }

        .feature-grid {
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .feature {
            background: white;
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(15,23,42,0.08);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .feature h3 {
            margin-bottom: 10px;
        }

        .feature p {
            color: #64748b;
            line-height: 1.6;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #0f172a;
            color: #94a3b8;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        .footer strong {
            color: white;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .hero-content {
                grid-template-columns: 1fr;
            }

            .hero-card {
                max-width: 600px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

            .header {
                padding: 20px;
            }

            .logo {
                font-size: 20px;
            }

            .nav a {
                padding: 9px 12px;
                font-size: 13px;
            }

            .hero {
                padding: 130px 20px 60px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 16px;
            }

            .features {
                padding: 60px 20px;
            }

        }

    </style>

</head>


<body>


    <!-- HEADER -->

    <header class="header">

        <a href="/" class="logo">

            <div class="logo-icon">
                🏗️
            </div>

            ObraSmart

        </a>


        <nav class="nav">

            <a
                href="{{ route('login') }}"
                class="login"
            >
                Iniciar sesión
            </a>

            <a
                href="{{ route('register') }}"
                class="register"
            >
                Registrarse
            </a>

        </nav>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">


            <div class="hero-text">

                <div class="tag">
                    🏗️ Construcción inteligente
                </div>

                <h1>
                    Planifica tu proyecto
                    <span>sin complicaciones.</span>
                </h1>

                <p>
                    ObraSmart te ayuda a estimar materiales, mano de obra,
                    tiempo y costos para proyectos de construcción y
                    remodelación de manera rápida y organizada.
                </p>


                <div class="hero-buttons">

                    <a
                        href="{{ route('register') }}"
                        class="btn-primary"
                    >
                        Comenzar ahora
                    </a>

                    <a
                        href="{{ route('login') }}"
                        class="btn-secondary"
                    >
                        Ya tengo una cuenta
                    </a>

                </div>

            </div>



            <!-- TARJETA DE EJEMPLO -->

            <div class="hero-card">

                <div class="hero-card-header">

                    <div class="card-icon">
                        📊
                    </div>

                    <div>

                        <h3>
                            Estimación del proyecto
                        </h3>

                        <p>
                            Ejemplo de presupuesto
                        </p>

                    </div>

                </div>


                <div class="estimate-box">

                    <div class="estimate-row">

                        <span class="estimate-label">
                            Materiales
                        </span>

                        <span class="estimate-value">
                            $1.250.000
                        </span>

                    </div>

                    <div class="estimate-row">

                        <span class="estimate-label">
                            Mano de obra
                        </span>

                        <span class="estimate-value">
                            $850.000
                        </span>

                    </div>

                    <div class="estimate-row">

                        <span class="estimate-label">
                            Tiempo estimado
                        </span>

                        <span class="estimate-value">
                            5 días
                        </span>

                    </div>

                </div>


                <div class="total">

                    <span>
                        Costo estimado
                    </span>

                    <strong>
                        $2.100.000
                    </strong>

                </div>

            </div>

        </div>

    </section>



    <!-- CARACTERÍSTICAS -->

    <section class="features">

        <div class="section-title">

            <h2>
                Todo lo que necesitas para planificar
            </h2>

            <p>
                Una herramienta diseñada para facilitar la estimación
                y planificación de tus trabajos de construcción y remodelación.
            </p>

        </div>


        <div class="feature-grid">


            <div class="feature">

                <div class="feature-icon">
                    🧱
                </div>

                <h3>
                    Materiales
                </h3>

                <p>
                    Calcula las cantidades necesarias de materiales
                    según las dimensiones de tu proyecto.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    👷
                </div>

                <h3>
                    Mano de obra
                </h3>

                <p>
                    Obtén una estimación del costo de mano de obra
                    de acuerdo con el tipo de trabajo.
                </p>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    📊
                </div>

                <h3>
                    Presupuesto
                </h3>

                <p>
                    Consulta un presupuesto preliminar con materiales,
                    mano de obra, tiempo y costo total.
                </p>

            </div>

        </div>

    </section>



    <!-- FOOTER -->

    <footer class="footer">

        <p>
            © {{ date('Y') }}
            <strong>ObraSmart</strong>.
            Sistema de estimación y planificación de construcción.
        </p>

    </footer>


</body>

</html>