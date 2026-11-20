<x-app-layout>

    <x-slot name="header">

        <h2>
            Mis estimaciones
        </h2>

        <p>
            Consulta las estimaciones realizadas para tus proyectos.
        </p>

    </x-slot>


    <div class="os-container">


        @if($estimaciones->count() > 0)

            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:20px;
                margin-bottom:25px;
            ">

                <div style="
                    background:white;
                    padding:22px;
                    border-radius:12px;
                    border:1px solid #e5e7eb;
                ">

                    <div style="font-size:25px;">
                        📊
                    </div>

                    <div style="
                        margin-top:8px;
                        color:#6b7280;
                        font-size:13px;
                    ">
                        Estimaciones realizadas
                    </div>

                    <strong style="
                        display:block;
                        margin-top:5px;
                        font-size:25px;
                    ">
                        {{ $estimaciones->count() }}
                    </strong>

                </div>


                <div style="
                    background:white;
                    padding:22px;
                    border-radius:12px;
                    border:1px solid #e5e7eb;
                ">

                    <div style="font-size:25px;">
                        🏗️
                    </div>

                    <div style="
                        margin-top:8px;
                        color:#6b7280;
                        font-size:13px;
                    ">
                        Proyectos estimados
                    </div>

                    <strong style="
                        display:block;
                        margin-top:5px;
                        font-size:25px;
                    ">
                        {{ $estimaciones->pluck('proyecto_id')->unique()->count() }}
                    </strong>

                </div>

            </div>

        @endif


        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            overflow:hidden;
        ">

            <div style="
                padding:22px;
                border-bottom:1px solid #e5e7eb;
            ">

                <h3 style="
                    margin:0;
                    font-size:18px;
                ">
                    Historial de estimaciones
                </h3>

            </div>


            @forelse($estimaciones as $estimacion)

                <div style="
                    padding:22px;
                    border-bottom:1px solid #f1f5f9;
                ">

                    <div style="
                        display:flex;
                        justify-content:space-between;
                        gap:20px;
                        flex-wrap:wrap;
                    ">

                        <div>

                            <h3 style="
                                margin:0;
                                font-size:17px;
                            ">
                                {{ $estimacion->proyecto->nombre }}
                            </h3>

                            <p style="
                                margin:6px 0;
                                color:#64748b;
                                font-size:13px;
                            ">
                                {{ $estimacion->proyecto->tipoTrabajo->nombre }}
                            </p>

                            <small style="color:#94a3b8;">
                                {{ $estimacion->fecha->format('d/m/Y') }}
                            </small>

                        </div>


                        <div style="text-align:right;">

                            <small style="color:#64748b;">
                                Costo total
                            </small>

                            <div style="
                                color:#2563eb;
                                font-size:22px;
                                font-weight:700;
                            ">
                                ${{ number_format(
                                    $estimacion->costo_total,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </div>

                        </div>

                    </div>


                    <div style="
                        display:grid;
                        grid-template-columns:
                            repeat(auto-fit,minmax(150px,1fr));
                        gap:12px;
                        margin-top:20px;
                    ">

                        <div style="
                            background:#f8fafc;
                            padding:12px;
                            border-radius:8px;
                        ">
                            <small>Materiales</small>

                            <strong style="display:block;">
                                ${{ number_format(
                                    $estimacion->costo_materiales,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </strong>
                        </div>


                        <div style="
                            background:#f8fafc;
                            padding:12px;
                            border-radius:8px;
                        ">
                            <small>Mano de obra</small>

                            <strong style="display:block;">
                                ${{ number_format(
                                    $estimacion->costo_mano_obra,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </strong>
                        </div>


                        <div style="
                            background:#f8fafc;
                            padding:12px;
                            border-radius:8px;
                        ">
                            <small>Magnitud</small>

                            <strong style="display:block;">
                                {{ $estimacion->magnitud }}
                            </strong>
                        </div>


                        <div style="
                            background:#f8fafc;
                            padding:12px;
                            border-radius:8px;
                        ">
                            <small>Tiempo</small>

                            <strong style="display:block;">
                                {{ $estimacion->tiempo_estimado }} horas
                            </strong>
                        </div>

                    </div>


                    <div style="
                        display:flex;
                        gap:10px;
                        margin-top:18px;
                        flex-wrap:wrap;
                    ">

                        <a
                            href="{{ route(
                                'proyectos.estimacion',
                                $estimacion->proyecto_id
                            ) }}"
                            style="
                                background:#2563eb;
                                color:white;
                                padding:9px 14px;
                                border-radius:7px;
                                text-decoration:none;
                                font-size:12px;
                                font-weight:600;
                            "
                        >
                            Ver estimación
                        </a>


                        <a
                            href="{{ route(
                                'proyectos.presupuesto',
                                $estimacion->proyecto_id
                            ) }}"
                            style="
                                background:#16a34a;
                                color:white;
                                padding:9px 14px;
                                border-radius:7px;
                                text-decoration:none;
                                font-size:12px;
                                font-weight:600;
                            "
                        >
                            Ver presupuesto
                        </a>


                        <a
                            href="{{ route(
                                'proyectos.historial',
                                $estimacion->proyecto_id
                            ) }}"
                            style="
                                background:#f1f5f9;
                                color:#334155;
                                padding:9px 14px;
                                border-radius:7px;
                                text-decoration:none;
                                font-size:12px;
                                font-weight:600;
                            "
                        >
                            Historial
                        </a>

                    </div>

                </div>

            @empty

                <div style="
                    padding:70px 20px;
                    text-align:center;
                ">

                    <div style="
                        font-size:50px;
                    ">
                        📊
                    </div>

                    <h3>
                        No tienes estimaciones todavía
                    </h3>

                    <p style="color:#64748b;">
                        Crea un proyecto para generar una estimación.
                    </p>

                    <a
                        href="{{ route('proyectos.crear') }}"
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
                        + Nuevo proyecto
                    </a>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>