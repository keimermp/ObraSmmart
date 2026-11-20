<x-app-layout>

    <x-slot name="header">

        <div style="display:flex; justify-content:space-between; align-items:center; width:100%;">

            <div>
                <h2 style="font-size:24px; font-weight:700; color:#111827; margin:0;">
                    Materiales
                </h2>

                <p style="margin-top:5px; color:#6b7280; font-size:14px;">
                    Administración de los materiales utilizados en los proyectos.
                </p>
            </div>

            {{-- BOTÓN AGREGAR MATERIAL --}}
            <a
                href="{{ route('materiales.crear') }}"
                style="
                    display:inline-flex;
                    align-items:center;
                    gap:8px;
                    background:#2563eb;
                    color:#ffffff;
                    padding:11px 18px;
                    border-radius:8px;
                    text-decoration:none;
                    font-size:14px;
                    font-weight:600;
                    box-shadow:0 2px 6px rgba(37,99,235,.25);
                "
            >
                <span style="font-size:18px;">+</span>
                Agregar nuevo material
            </a>

        </div>

    </x-slot>


    <div style="
        min-height:calc(100vh - 150px);
        background:#f5f7fb;
        padding:35px 40px;
    ">

        <div style="
            max-width:1400px;
            margin:0 auto;
        ">


            {{-- MENSAJE DE ÉXITO --}}
            @if(session('success'))

                <div style="
                    background:#dcfce7;
                    border:1px solid #86efac;
                    color:#166534;
                    padding:14px 18px;
                    border-radius:8px;
                    margin-bottom:22px;
                    font-size:14px;
                ">
                    {{ session('success') }}
                </div>

            @endif


            {{-- TARJETA --}}
            <div style="
                background:#ffffff;
                border-radius:12px;
                border:1px solid #e5e7eb;
                box-shadow:0 2px 8px rgba(0,0,0,.05);
                overflow:hidden;
            ">


                {{-- CABECERA --}}
                <div style="
                    padding:20px 24px;
                    border-bottom:1px solid #e5e7eb;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                ">

                    <div>

                        <h3 style="
                            margin:0;
                            font-size:18px;
                            font-weight:700;
                            color:#111827;
                        ">
                            Lista de materiales
                        </h3>

                        <p style="
                            margin:5px 0 0;
                            font-size:13px;
                            color:#6b7280;
                        ">
                            Materiales registrados en ObraSmart.
                        </p>

                    </div>

                    <div style="
                        background:#eff6ff;
                        color:#2563eb;
                        padding:7px 12px;
                        border-radius:20px;
                        font-size:13px;
                        font-weight:600;
                    ">
                        {{ $materiales->count() }} materiales
                    </div>

                </div>


                {{-- TABLA --}}
                <div style="overflow-x:auto;">

                    <table style="
                        width:100%;
                        border-collapse:collapse;
                    ">

                        <thead>

                            <tr style="
                                background:#f9fafb;
                                border-bottom:1px solid #e5e7eb;
                            ">

                                <th style="
                                    text-align:left;
                                    padding:14px 20px;
                                    font-size:12px;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.04em;
                                ">
                                    Material
                                </th>

                                <th style="
                                    text-align:left;
                                    padding:14px 20px;
                                    font-size:12px;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.04em;
                                ">
                                    Unidad
                                </th>

                                <th style="
                                    text-align:left;
                                    padding:14px 20px;
                                    font-size:12px;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.04em;
                                ">
                                    Descripción
                                </th>

                                <th style="
                                    text-align:center;
                                    padding:14px 20px;
                                    font-size:12px;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.04em;
                                ">
                                    Estado
                                </th>

                                <th style="
                                    text-align:center;
                                    padding:14px 20px;
                                    font-size:12px;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.04em;
                                ">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($materiales as $material)

                                <tr style="
                                    border-bottom:1px solid #f0f0f0;
                                ">

                                    {{-- NOMBRE --}}
                                    <td style="
                                        padding:16px 20px;
                                        color:#111827;
                                        font-size:14px;
                                        font-weight:600;
                                    ">

                                        <div style="
                                            display:flex;
                                            align-items:center;
                                            gap:10px;
                                        ">

                                            <div style="
                                                width:36px;
                                                height:36px;
                                                border-radius:8px;
                                                background:#eff6ff;
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                                font-size:18px;
                                            ">
                                                🧱
                                            </div>

                                            {{ $material->nombre }}

                                        </div>

                                    </td>


                                    {{-- UNIDAD --}}
                                    <td style="
                                        padding:16px 20px;
                                        color:#4b5563;
                                        font-size:14px;
                                    ">
                                        {{ $material->unidad }}
                                    </td>


                                    {{-- DESCRIPCIÓN --}}
                                    <td style="
                                        padding:16px 20px;
                                        color:#6b7280;
                                        font-size:14px;
                                    ">
                                        {{ $material->descripcion ?: 'Sin descripción' }}
                                    </td>


                                    {{-- ESTADO --}}
                                    <td style="
                                        padding:16px 20px;
                                        text-align:center;
                                    ">

                                        @if($material->activo)

                                            <span style="
                                                display:inline-block;
                                                background:#dcfce7;
                                                color:#166534;
                                                padding:6px 12px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                Activo
                                            </span>

                                        @else

                                            <span style="
                                                display:inline-block;
                                                background:#fee2e2;
                                                color:#991b1b;
                                                padding:6px 12px;
                                                border-radius:20px;
                                                font-size:12px;
                                                font-weight:600;
                                            ">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td style="
                                        padding:16px 20px;
                                        text-align:center;
                                    ">

                                        <div style="
                                            display:flex;
                                            justify-content:center;
                                            align-items:center;
                                            gap:8px;
                                        ">


                                            {{-- EDITAR --}}
                                            <a
                                                href="{{ route('materiales.editar', $material->id) }}"
                                                style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                    background:#2563eb;
                                                    color:white;
                                                    padding:8px 13px;
                                                    border-radius:7px;
                                                    text-decoration:none;
                                                    font-size:12px;
                                                    font-weight:600;
                                                "
                                            >
                                                Editar
                                            </a>


                                            {{-- ACTIVAR / DESACTIVAR --}}
                                            <form
                                                action="{{ route('materiales.estado', $material->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                @if($material->activo)

                                                    <button
                                                        type="submit"
                                                        style="
                                                            border:none;
                                                            background:#dc2626;
                                                            color:#ffffff;
                                                            padding:8px 13px;
                                                            border-radius:7px;
                                                            font-size:12px;
                                                            font-weight:600;
                                                            cursor:pointer;
                                                        "
                                                    >
                                                        Desactivar
                                                    </button>

                                                @else

                                                    <button
                                                        type="submit"
                                                        style="
                                                            border:none;
                                                            background:#16a34a;
                                                            color:#ffffff;
                                                            padding:8px 13px;
                                                            border-radius:7px;
                                                            font-size:12px;
                                                            font-weight:600;
                                                            cursor:pointer;
                                                        "
                                                    >
                                                        Activar
                                                    </button>

                                                @endif

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        style="
                                            padding:50px 20px;
                                            text-align:center;
                                            color:#6b7280;
                                        "
                                    >

                                        <div style="font-size:40px; margin-bottom:10px;">
                                            🧱
                                        </div>

                                        <div style="
                                            font-size:16px;
                                            font-weight:600;
                                            color:#374151;
                                        ">
                                            No hay materiales registrados
                                        </div>

                                        <p style="
                                            margin-top:5px;
                                            font-size:13px;
                                        ">
                                            Agrega el primer material para comenzar.
                                        </p>

                                        <a
                                            href="{{ route('materiales.crear') }}"
                                            style="
                                                display:inline-block;
                                                margin-top:15px;
                                                background:#2563eb;
                                                color:white;
                                                padding:10px 16px;
                                                border-radius:7px;
                                                text-decoration:none;
                                                font-size:13px;
                                                font-weight:600;
                                            "
                                        >
                                            + Agregar material
                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>