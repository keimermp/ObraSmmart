<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- ICONO DE OBRASMART --}}
<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon.png') }}?v=2">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}?v=2">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ObraSmart</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* =========================
           NAVBAR
        ========================= */

        .os-navbar {
            width: 100%;
            min-height: 72px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            padding: 0 35px;
            gap: 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* LOGO */

        .os-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #111827;
            flex-shrink: 0;
        }

        .os-logo {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 800;
        }

        .os-brand-name {
            font-size: 19px;
            font-weight: 800;
        }

        .os-brand-subtitle {
            font-size: 10px;
            color: #6b7280;
        }

        /* MENU */

        .os-menu {
            display: flex;
            align-items: center;
            gap: 5px;
            flex: 1;
        }

        .os-menu a {
            text-decoration: none;
            color: #4b5563;
            padding: 10px 13px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .os-menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .os-menu a.active {
            background: #2563eb;
            color: white;
        }

        /* USUARIO */

        .os-user {
            display: flex;
            align-items: center;
            gap: 9px;
            flex-shrink: 0;
        }

        .os-avatar {
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

        .os-user-name {
            font-size: 13px;
            font-weight: 700;
            color: #374151;
        }

        .os-user-role {
            font-size: 10px;
            color: #6b7280;
            margin-top: 2px;
        }

        .os-logout {
            margin-left: 8px;
            border: none;
            background: #fef2f2;
            color: #dc2626;
            padding: 8px 10px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .os-logout:hover {
            background: #fee2e2;
        }

        /* PAGE HEADER */

        .os-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 25px 35px;
        }

        .os-header-inner {
            max-width: 1400px;
            margin: auto;
        }

        .os-header h2 {
            margin: 0;
            font-size: 24px;
            color: #111827;
        }

        .os-header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        /* CONTENT */

        .os-content {
            min-height: calc(100vh - 72px);
        }

        .os-container {
            max-width: 1400px;
            margin: auto;
            padding: 30px 35px;
        }

        /* RESPONSIVE */

        @media(max-width:1100px) {

            .os-navbar {
                flex-wrap: wrap;
                padding: 15px 20px;
            }

            .os-menu {
                order: 3;
                width: 100%;
                overflow-x: auto;
            }

            .os-user {
                margin-left: auto;
            }

        }

        @media(max-width:650px) {

            .os-brand-subtitle,
            .os-user-name,
            .os-user-role {
                display: none;
            }

            .os-navbar {
                gap: 12px;
            }

            .os-menu a {
                white-space: nowrap;
            }

            .os-container {
                padding: 20px;
            }

        }

    </style>

</head>


<body>

    <header class="os-navbar">

        {{-- LOGO --}}
        <a
            href="{{ route('dashboard') }}"
            class="os-brand"
        >

            <div class="os-logo">
                O
            </div>

            <div>

                <div class="os-brand-name">
                    ObraSmart
                </div>

                <div class="os-brand-subtitle">
                    Gestión inteligente de construcción
                </div>

            </div>

        </a>


        {{-- MENU --}}
        <nav class="os-menu">

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                🏠 Inicio
            </a>


            @if(auth()->user()->rol_id == 2)

                {{-- USUARIO --}}

                <a
                    href="{{ route('proyectos.index') }}"
                    class="{{ request()->routeIs('proyectos.index') ? 'active' : '' }}"
                >
                    📋 Mis proyectos
                </a>

                <a
                    href="{{ route('proyectos.crear') }}"
                    class="{{ request()->routeIs('proyectos.crear') ? 'active' : '' }}"
                >
                    ➕ Nuevo proyecto
                </a>

                <a
                    href="{{ route('estimaciones.index') }}"
                    class="{{ request()->routeIs('estimaciones.*') ? 'active' : '' }}"
                >
                    📊 Mis estimaciones
                </a>


            @elseif(auth()->user()->rol_id == 1)

                {{-- ADMINISTRADOR --}}

                <a
                    href="{{ route('materiales.index') }}"
                    class="{{ request()->routeIs('materiales.*') ? 'active' : '' }}"
                >
                    🧱 Materiales
                </a>

                <a
                    href="{{ route('precios.index') }}"
                    class="{{ request()->routeIs('precios.*') ? 'active' : '' }}"
                >
                    💰 Precios
                </a>

                <a
                    href="{{ route('tipos-trabajo.index') }}"
                    class="{{ request()->routeIs('tipos-trabajo.*') ? 'active' : '' }}"
                >
                    🔨 Tipos de trabajo
                </a>

            @endif


            {{-- PERFIL --}}

            <a
                href="{{ route('profile.edit') }}"
                class="{{ request()->routeIs('profile.*') ? 'active' : '' }}"
            >
                👤 Mi perfil
            </a>

        </nav>


        {{-- USUARIO --}}

        <div class="os-user">

            <div class="os-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>

                <div class="os-user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="os-user-role">

                    @if(auth()->user()->rol_id == 1)
                        Administrador
                    @else
                        Usuario
                    @endif

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="os-logout"
                >
                    Salir
                </button>

            </form>

        </div>

    </header>


    {{-- HEADER DE LA PÁGINA --}}

    @isset($header)

        <div class="os-header">

            <div class="os-header-inner">

                {{ $header }}

            </div>

        </div>

    @endisset


    {{-- CONTENIDO --}}

    <main class="os-content">

        {{ $slot }}

    </main>

</body>

</html>