<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Historial - ObraSmart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        .contenedor {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .tarjeta {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        h1 {
            margin-top: 0;
            color: #1f2937;
        }

        h2 {
            color: #374151;
            margin-top: 0;
        }

        .subtitulo {
            color: #6b7280;
        }

        .info-proyecto {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .dato {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 18px;
            border-radius: 8px;
        }

        .dato span {
            display: block;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .dato strong {
            font-size: 18px;
            color: #111827;
        }

        .estimacion {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 22px;
            margin-top: 20px;
        }

        .estimacion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .fecha {
            color: #6b7280;
            font-size: 14px;
        }

        .numero {
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .resumen {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .resumen .dato {
            padding: 15px;
        }

        .resumen .dato strong {
            font-size: 17px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 11px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #374151;
        }

        .total {
            margin-top: 20px;
            background: #eff6ff;
            border: 2px solid #2563eb;
            padding: 18px;
            border-radius: 8px;
            text-align: right;
        }

        .total span {
            display: block;
            color: #374151;
            margin-bottom: 5px;
        }

        .total strong {
            font-size: 25px;
            color: #2563eb;
        }

        .sin-estimaciones {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        .botones {
            margin-top: 25px;
            display: flex;
            gap: 12px;
        }

        .boton {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 15px;
        }

        .principal {
            background: #2563eb;
            color: white;
        }

        .secundario {
            background: #e5e7eb;
            color: #111827;
        }

        @media (max-width: 800px) {

            .info-proyecto,
            .resumen {
                grid-template-columns: 1fr;
            }

            .estimacion-header {
                flex-direction: column;
                align-items: flex-start;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <!-- Información del proyecto -->

    <div class="tarjeta">

        <h1>Historial de estimaciones</h1>

        <p class="subtitulo">
            Consulta las estimaciones generadas anteriormente para este proyecto.
        </p>

        <h2>{{ $proyecto->nombre }}</h2>

        @if ($proyecto->descripcion)
            <p>{{ $proyecto->descripcion }}</p>
        @endif

        <div class="info-proyecto">

            <div class="dato">
                <span>Tipo de trabajo</span>

                <strong>
                    {{ $proyecto->tipoTrabajo->nombre }}
                </strong>
            </div>

            <div class="dato">
                <span>Unidad de magnitud</span>

                <strong>
                    {{ $proyecto->tipoTrabajo->unidad_magnitud }}
                </strong>
            </div>

        </div>

    </div>


    <!-- Historial -->

    <div class="tarjeta">

        <h2>Estimaciones registradas</h2>

        @if ($estimaciones->count() > 0)

            @foreach ($estimaciones as $estimacion)

                <div class="estimacion">

                    <div class="estimacion-header">

                        <div>

                            <span class="numero">
                                Estimación #{{ $estimacion->id }}
                            </span>

                            <div class="fecha">
                                Fecha:
                                {{ $estimacion->fecha->format('d/m/Y') }}
                            </div>

                        </div>

                    </div>


                    <!-- Resumen de la estimación -->

                    <div class="resumen">

                        <div class="dato">

                            <span>Magnitud</span>

                            <strong>
                                {{ number_format(
                                    (float) $estimacion->magnitud,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                                {{ $proyecto->tipoTrabajo->unidad_magnitud }}
                            </strong>

                        </div>


                        <div class="dato">

                            <span>Materiales</span>

                            <strong>
                                ${{ number_format(
                                    (float) $estimacion->costo_materiales,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </strong>

                        </div>


                        <div class="dato">

                            <span>Mano de obra</span>

                            <strong>
                                ${{ number_format(
                                    (float) $estimacion->costo_mano_obra,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </strong>

                        </div>


                        <div class="dato">

                            <span>Tiempo estimado</span>

                            <strong>
                                {{ number_format(
                                    (float) $estimacion->tiempo_estimado,
                                    2,
                                    ',',
                                    '.'
                                ) }}
                            </strong>

                        </div>

                    </div>


                    <!-- Materiales -->

                    @if ($estimacion->detalles->count() > 0)

                        <table>

                            <thead>

                                <tr>
                                    <th>Material</th>
                                    <th>Cantidad</th>
                                    <th>Rendimiento</th>
                                    <th>Precio unitario</th>
                                    <th>Subtotal</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($estimacion->detalles as $detalle)

                                    <tr>

                                        <td>
                                            {{ $detalle->material->nombre }}
                                        </td>

                                        <td>
                                            {{ number_format(
                                                (float) $detalle->cantidad,
                                                2,
                                                ',',
                                                '.'
                                            ) }}

                                            {{ $detalle->material->unidad }}
                                        </td>

                                        <td>
                                            {{ number_format(
                                                (float) $detalle->rendimiento,
                                                2,
                                                ',',
                                                '.'
                                            ) }}
                                        </td>

                                        <td>
                                            ${{ number_format(
                                                (float) $detalle->precio_unitario,
                                                2,
                                                ',',
                                                '.'
                                            ) }}
                                        </td>

                                        <td>
                                            ${{ number_format(
                                                (float) $detalle->subtotal,
                                                2,
                                                ',',
                                                '.'
                                            ) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @endif


                    <!-- Total -->

                    <div class="total">

                        <span>
                            Costo total estimado
                        </span>

                        <strong>
                            ${{ number_format(
                                (float) $estimacion->costo_total,
                                2,
                                ',',
                                '.'
                            ) }}
                        </strong>

                    </div>

                </div>

            @endforeach

        @else

            <div class="sin-estimaciones">

                <p>
                    Este proyecto todavía no tiene estimaciones registradas.
                </p>

            </div>

        @endif


        <!-- Botones -->

        <div class="botones">

            <a
                href="{{ route('proyectos.index') }}"
                class="boton principal"
            >
                Volver a proyectos
            </a>

            <a
                href="{{ route('proyectos.estimacion', $proyecto->id) }}"
                class="boton secundario"
            >
                Ver última estimación
            </a>

        </div>

    </div>

</div>

</body>
</html>