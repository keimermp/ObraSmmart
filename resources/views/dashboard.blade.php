<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        ObraSmart | Dashboard
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
        }


        .app {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 260px;
            min-height: 100vh;

            background: linear-gradient(
                180deg,
                #0f172a 0%,
                #172554 100%
            );

            color: white;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            z-index: 100;

            display: flex;
            flex-direction: column;
        }


        .sidebar-logo {
            height: 85px;

            display: flex;
            align-items: center;

            padding: 0 25px;

            border-bottom:
                1px solid rgba(255,255,255,0.08);
        }


        .logo-icon {
            width: 43px;
            height: 43px;

            background: #2563eb;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            margin-right: 12px;
        }


        .logo-text {
            font-size: 21px;
            font-weight: 800;
        }


        .logo-subtitle {
            font-size: 10px;
            color: #94a3b8;
            margin-top: 2px;
        }


        /* =========================
           MENU
        ========================= */

        .menu {
            flex: 1;

            padding: 25px 14px;

            overflow-y: auto;
        }


        .menu-title {
            color: #64748b;

            font-size: 11px;

            text-transform: uppercase;

            font-weight: 700;

            letter-spacing: 1px;

            padding: 0 12px;

            margin-bottom: 10px;
        }


        .menu-section {
            margin-bottom: 28px;
        }


        .menu-link {
            display: flex;

            align-items: center;

            gap: 13px;

            width: 100%;

            padding: 12px 13px;

            margin-bottom: 5px;

            border-radius: 9px;

            color: #cbd5e1;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }


        .menu-link:hover {
            background: rgba(255,255,255,0.08);
            color: white;
        }


        .menu-link.active {
            background: #2563eb;

            color: white;

            box-shadow:
                0 5px 15px rgba(37,99,235,0.25);
        }


        .menu-icon {
            width: 22px;

            text-align: center;

            font-size: 17px;
        }


        /* =========================
           USUARIO SIDEBAR
        ========================= */

        .sidebar-user {
            padding: 18px;

            border-top:
                1px solid rgba(255,255,255,0.08);
        }


        .user-box {
            display: flex;

            align-items: center;

            gap: 11px;

            margin-bottom: 12px;
        }


        .user-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;

            color: white;
        }


        .user-name {
            font-size: 13px;

            font-weight: 700;

            color: white;
        }


        .user-role {
            font-size: 11px;

            color: #94a3b8;

            margin-top: 2px;
        }


        .logout-button {
            width: 100%;

            border:
                1px solid rgba(255,255,255,0.1);

            background:
                rgba(255,255,255,0.04);

            color: #cbd5e1;

            padding: 9px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s;
        }


        .logout-button:hover {
            background:
                rgba(239,68,68,0.15);

            color: #fca5a5;
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 260px;

            width: calc(100% - 260px);

            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 85px;

            background: white;

            border-bottom:
                1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 35px;
        }


        .page-title h1 {
            font-size: 22px;

            color: #172033;
        }


        .page-title p {
            color: #64748b;

            font-size: 13px;

            margin-top: 4px;
        }


        .top-user {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .top-avatar {
            width: 37px;
            height: 37px;

            border-radius: 50%;

            background: #dbeafe;

            color: #1d4ed8;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;
        }


        .top-user-name {
            font-size: 14px;

            font-weight: 600;

            color: #334155;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 35px;
        }


        /* =========================
           WELCOME
        ========================= */

        .welcome {
            background:
                linear-gradient(
                    120deg,
                    #1d4ed8,
                    #2563eb,
                    #3b82f6
                );

            color: white;

            border-radius: 18px;

            padding: 30px;

            margin-bottom: 28px;

            position: relative;

            overflow: hidden;
        }


        .welcome::after {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.06);

            right: -80px;

            top: -100px;
        }


        .welcome h2 {
            font-size: 27px;

            margin-bottom: 9px;

            position: relative;

            z-index: 2;
        }


        .welcome p {
            color: #dbeafe;

            font-size: 15px;

            position: relative;

            z-index: 2;
        }


        /* =========================
           CARDS
        ========================= */

        .cards {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 20px;

            margin-bottom: 30px;
        }


        .card {
            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 23px;

            transition: 0.2s;
        }


        .card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 30px
                rgba(15,23,42,0.07);
        }


        .card-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #eff6ff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            margin-bottom: 17px;
        }


        .card h3 {
            font-size: 17px;

            margin-bottom: 8px;
        }


        .card p {
            color: #64748b;

            font-size: 13px;

            line-height: 1.6;

            margin-bottom: 18px;
        }


        .card-button {
            display: inline-block;

            background: #2563eb;

            color: white;

            text-decoration: none;

            padding: 9px 14px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;
        }


        .card-button:hover {
            background: #1d4ed8;
        }


        .card-button.secondary {
            background: #f1f5f9;

            color: #334155;
        }


        .card-button.secondary:hover {
            background: #e2e8f0;
        }


        /* =========================
           SECTION
        ========================= */

        .section {
            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 25px;

            margin-bottom: 25px;
        }


        .section-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }


        .section-header h2 {
            font-size: 18px;
        }


        .section-header span {
            color: #64748b;

            font-size: 13px;
        }


        /* =========================
           STEPS
        ========================= */

        .steps {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 15px;
        }


        .step {
            background: #f8fafc;

            border:
                1px solid #e2e8f0;

            border-radius: 11px;

            padding: 18px;
        }


        .step-number {
            width: 32px;
            height: 32px;

            background: #dbeafe;

            color: #1d4ed8;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;

            margin-bottom: 12px;
        }


        .step h3 {
            font-size: 14px;

            margin-bottom: 6px;
        }


        .step p {
            color: #64748b;

            font-size: 12px;

            line-height: 1.5;
        }


        /* =========================
           ADMIN
        ========================= */

        .admin-section {
            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 25px;
        }


        .admin-section h2 {
            font-size: 18px;

            margin-bottom: 18px;
        }


        .admin-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;
        }


        .admin-link {
            display: flex;

            align-items: center;

            gap: 13px;

            padding: 15px;

            border:
                1px solid #e2e8f0;

            border-radius: 10px;

            text-decoration: none;

            color: #334155;

            transition: 0.2s;
        }


        .admin-link:hover {
            border-color: #93c5fd;

            background: #eff6ff;

            color: #1d4ed8;
        }


        .admin-link-icon {
            width: 40px;
            height: 40px;

            border-radius: 9px;

            background: #f1f5f9;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 19px;
        }


        .admin-link strong {
            display: block;

            font-size: 13px;
        }


        .admin-link small {
            display: block;

            color: #94a3b8;

            margin-top: 3px;

            font-size: 11px;
        }


        /* =========================
           MOBILE
        ========================= */

        .mobile-menu-button {
            display: none;

            border: none;

            background: #eff6ff;

            color: #2563eb;

            width: 40px;
            height: 40px;

            border-radius: 8px;

            font-size: 20px;

            cursor: pointer;
        }


        @media (max-width: 1100px) {

            .cards {
                grid-template-columns:
                    repeat(2, 1fr);
            }


            .steps {
                grid-template-columns:
                    repeat(2, 1fr);
            }


            .admin-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 800px) {

            .sidebar {
                transform:
                    translateX(-100%);

                transition: 0.3s;
            }


            .sidebar.open {
                transform:
                    translateX(0);
            }


            .main {
                margin-left: 0;

                width: 100%;
            }


            .mobile-menu-button {
                display: block;
            }


            .topbar {
                padding: 0 20px;
            }


            .content {
                padding: 20px;
            }


            .cards {
                grid-template-columns: 1fr;
            }


            .admin-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 550px) {

            .top-user-name {
                display: none;
            }


            .page-title p {
                display: none;
            }


            .welcome {
                padding: 23px;
            }


            .welcome h2 {
                font-size: 22px;
            }


            .steps {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="app">


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside
        class="sidebar"
        id="sidebar"
    >

        <div class="sidebar-logo">

            <div class="logo-icon">
                🏗️
            </div>

            <div>

                <div class="logo-text">
                    ObraSmart
                </div>

                <div class="logo-subtitle">
                    Gestión de construcción
                </div>

            </div>

        </div>


        <nav class="menu">


            <!-- =========================
                 INICIO
            ========================= -->

            <div class="menu-section">

                <div class="menu-title">
                    Principal
                </div>


                <a
                    href="{{ route('dashboard') }}"
                    class="menu-link active"
                >

                    <span class="menu-icon">
                        🏠
                    </span>

                    <span>
                        Inicio
                    </span>

                </a>

            </div>


            <!-- =========================
                 SOLO USUARIO
            ========================= -->

            @if(auth()->user()->rol_id === 2)

                <div class="menu-section">

                    <div class="menu-title">
                        Proyectos
                    </div>


                    <!-- MIS PROYECTOS -->

                    <a
                        href="{{ route('proyectos.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            📁
                        </span>

                        <span>
                            Mis proyectos
                        </span>

                    </a>


                    <!-- NUEVO PROYECTO -->

                    <a
                        href="{{ route('proyectos.crear') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            ➕
                        </span>

                        <span>
                            Nuevo proyecto
                        </span>

                    </a>

                </div>


                <!-- =========================
                     MIS ESTIMACIONES
                ========================= -->

                <div class="menu-section">

                    <div class="menu-title">
                        Estimaciones
                    </div>


                    <a
                        href="{{ route('estimaciones.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            📊
                        </span>

                        <span>
                            Mis estimaciones
                        </span>

                    </a>

                </div>

            @endif


            <!-- =========================
                 SOLO ADMINISTRADOR
            ========================= -->

            @if(auth()->user()->rol_id === 1)

                <div class="menu-section">

                    <div class="menu-title">
                        Administración
                    </div>


                    <!-- MATERIALES -->

                    <a
                        href="{{ route('materiales.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            🧱
                        </span>

                        <span>
                            Materiales
                        </span>

                    </a>


                    <!-- PRECIOS -->

                    <a
                        href="{{ route('precios.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            💰
                        </span>

                        <span>
                            Precios
                        </span>

                    </a>


                    <!-- TIPOS DE TRABAJO -->

                    <a
                        href="{{ route('tipos-trabajo.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
                            🛠️
                        </span>

                        <span>
                            Tipos de trabajo
                        </span>

                    </a>

                </div>

            @endif


            <!-- =========================
                 CUENTA
            ========================= -->

            <div class="menu-section">

                <div class="menu-title">
                    Cuenta
                </div>


                <a
                    href="{{ route('profile.edit') }}"
                    class="menu-link"
                >

                    <span class="menu-icon">
                        👤
                    </span>

                    <span>
                        Mi perfil
                    </span>

                </a>

            </div>

        </nav>


        <!-- =========================
             USUARIO
        ========================= -->

        <div class="sidebar-user">

            <div class="user-box">

                <div class="user-avatar">

                    {{ strtoupper(
                        substr(auth()->user()->name, 0, 1)
                    ) }}

                </div>


                <div>

                    <div class="user-name">

                        {{ auth()->user()->name }}

                    </div>


                    <div class="user-role">

                        @if(auth()->user()->rol_id === 1)

                            Administrador

                        @else

                            Usuario

                        @endif

                    </div>

                </div>

            </div>


            <!-- CERRAR SESIÓN -->

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    🚪 Cerrar sesión

                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================= -->

    <main class="main">


        <!-- =========================
             TOPBAR
        ========================= -->

        <header class="topbar">

            <div
                style="
                    display:flex;
                    align-items:center;
                    gap:15px;
                "
            >

                <button
                    class="mobile-menu-button"
                    onclick="toggleMenu()"
                    type="button"
                >
                    ☰
                </button>


                <div class="page-title">

                    <h1>
                        Inicio
                    </h1>

                    <p>
                        Panel de control de ObraSmart
                    </p>

                </div>

            </div>


            <div class="top-user">

                <div class="top-avatar">

                    {{ strtoupper(
                        substr(auth()->user()->name, 0, 1)
                    ) }}

                </div>


                <span class="top-user-name">

                    {{ auth()->user()->name }}

                </span>

            </div>

        </header>


        <!-- =========================
             CONTENIDO
        ========================= -->

        <div class="content">


            <!-- =========================
                 BIENVENIDA
            ========================= -->

            <section class="welcome">

                <h2>

                    Bienvenido,
                    {{ auth()->user()->name }} 👋

                </h2>


                @if(auth()->user()->rol_id === 1)

                    <p>

                        Administra los recursos y configuraciones
                        necesarias para el funcionamiento de ObraSmart.

                    </p>

                @else

                    <p>

                        Gestiona tus proyectos de construcción y obtén
                        estimaciones de materiales, mano de obra,
                        tiempo y costos.

                    </p>

                @endif

            </section>


            <!-- =========================
                 TARJETAS USUARIO
            ========================= -->

            @if(auth()->user()->rol_id === 2)

                <div class="cards">


                    <!-- MIS PROYECTOS -->

                    <div class="card">

                        <div class="card-icon">
                            📁
                        </div>


                        <h3>
                            Mis proyectos
                        </h3>


                        <p>

                            Consulta y administra los proyectos que
                            has registrado en ObraSmart.

                        </p>


                        <a
                            href="{{ route('proyectos.index') }}"
                            class="card-button"
                        >

                            Ver proyectos

                        </a>

                    </div>


                    <!-- NUEVO PROYECTO -->

                    <div class="card">

                        <div class="card-icon">
                            ➕
                        </div>


                        <h3>
                            Nuevo proyecto
                        </h3>


                        <p>

                            Registra un nuevo proyecto y calcula
                            automáticamente su estimación.

                        </p>


                        <a
                            href="{{ route('proyectos.crear') }}"
                            class="card-button"
                        >

                            Crear proyecto

                        </a>

                    </div>


                    <!-- =========================
                         MIS ESTIMACIONES
                    ========================= -->

                    <div class="card">

                        <div class="card-icon">
                            📊
                        </div>


                        <h3>
                            Mis estimaciones
                        </h3>


                        <p>

                            Consulta las estimaciones y presupuestos
                            generados para tus proyectos.

                        </p>


                        <!--
                            CORREGIDO:
                            Antes apuntaba a proyectos.index.
                            Ahora apunta a estimaciones.index.
                        -->

                        <a
                            href="{{ route('estimaciones.index') }}"
                            class="card-button secondary"
                        >

                            Consultar

                        </a>

                    </div>

                </div>

            @endif


            <!-- =========================
                 TARJETAS ADMIN
            ========================= -->

            @if(auth()->user()->rol_id === 1)

                <div class="cards">


                    <!-- MATERIALES -->

                    <div class="card">

                        <div class="card-icon">
                            🧱
                        </div>


                        <h3>
                            Materiales
                        </h3>


                        <p>

                            Administra los materiales utilizados
                            en las estimaciones de ObraSmart.

                        </p>


                        <a
                            href="{{ route('materiales.index') }}"
                            class="card-button"
                        >

                            Gestionar materiales

                        </a>

                    </div>


                    <!-- PRECIOS -->

                    <div class="card">

                        <div class="card-icon">
                            💰
                        </div>


                        <h3>
                            Precios
                        </h3>


                        <p>

                            Administra los precios actuales e
                            históricos de los materiales.

                        </p>


                        <a
                            href="{{ route('precios.index') }}"
                            class="card-button"
                        >

                            Gestionar precios

                        </a>

                    </div>


                    <!-- TIPOS DE TRABAJO -->

                    <div class="card">

                        <div class="card-icon">
                            🛠️
                        </div>


                        <h3>
                            Tipos de trabajo
                        </h3>


                        <p>

                            Configura magnitudes, productividad,
                            mano de obra y materiales.

                        </p>


                        <a
                            href="{{ route('tipos-trabajo.index') }}"
                            class="card-button"
                        >

                            Gestionar trabajos

                        </a>

                    </div>

                </div>

            @endif


            <!-- =========================
                 COMO FUNCIONA
            ========================= -->

            <section class="section">

                <div class="section-header">

                    <h2>
                        ¿Cómo funciona ObraSmart?
                    </h2>

                    <span>
                        Proceso de estimación
                    </span>

                </div>


                <div class="steps">


                    <!-- PASO 1 -->

                    <div class="step">

                        <div class="step-number">
                            1
                        </div>


                        <h3>
                            Crear proyecto
                        </h3>


                        <p>

                            Registra el nombre, tipo de trabajo
                            y descripción del proyecto.

                        </p>

                    </div>


                    <!-- PASO 2 -->

                    <div class="step">

                        <div class="step-number">
                            2
                        </div>


                        <h3>
                            Ingresar dimensiones
                        </h3>


                        <p>

                            Introduce las dimensiones necesarias
                            según el tipo de trabajo.

                        </p>

                    </div>


                    <!-- PASO 3 -->

                    <div class="step">

                        <div class="step-number">
                            3
                        </div>


                        <h3>
                            Calcular estimación
                        </h3>


                        <p>

                            ObraSmart calcula materiales,
                            mano de obra y tiempo estimado.

                        </p>

                    </div>


                    <!-- PASO 4 -->

                    <div class="step">

                        <div class="step-number">
                            4
                        </div>


                        <h3>
                            Generar presupuesto
                        </h3>


                        <p>

                            Consulta el costo total y genera
                            tu presupuesto preliminar.

                        </p>

                    </div>


                </div>

            </section>


            <!-- =========================
                 ADMINISTRACIÓN
            ========================= -->

            @if(auth()->user()->rol_id === 1)

                <section class="admin-section">

                    <h2>
                        ⚙️ Administración del sistema
                    </h2>


                    <div class="admin-grid">


                        <!-- MATERIALES -->

                        <a
                            href="{{ route('materiales.index') }}"
                            class="admin-link"
                        >

                            <div class="admin-link-icon">
                                🧱
                            </div>


                            <div>

                                <strong>
                                    Materiales
                                </strong>

                                <small>
                                    Gestionar materiales
                                </small>

                            </div>

                        </a>


                        <!-- PRECIOS -->

                        <a
                            href="{{ route('precios.index') }}"
                            class="admin-link"
                        >

                            <div class="admin-link-icon">
                                💰
                            </div>


                            <div>

                                <strong>
                                    Precios
                                </strong>

                                <small>
                                    Gestionar precios
                                </small>

                            </div>

                        </a>


                        <!-- TIPOS DE TRABAJO -->

                        <a
                            href="{{ route('tipos-trabajo.index') }}"
                            class="admin-link"
                        >

                            <div class="admin-link-icon">
                                🛠️
                            </div>


                            <div>

                                <strong>
                                    Tipos de trabajo
                                </strong>

                                <small>
                                    Configurar trabajos
                                </small>

                            </div>

                        </a>


                    </div>

                </section>

            @endif


        </div>

    </main>

</div>


<script>

    function toggleMenu() {

        const sidebar =
            document.getElementById('sidebar');

        sidebar.classList.toggle('open');

    }

</script>


</body>

</html>