<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Estimación - ObraSmart</title>

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
            max-width: 1000px;
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

        .resumen {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .dato {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 20px;
            border-radius: 8px;
        }

        .dato span {
            display: block;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .dato strong {
            font-size: 20px;
            color: #111827;
        }

        .total {
            background: #eff6ff;
            border: 2px solid #2563eb;
            margin-top: 25px;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .total span {
            display: block;
            color: #374151;
            margin-bottom: 8px;
        }

        .total strong {
            font-size: 32px;
            color: #2563eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #374151;
        }

        .botones {
            margin-top: 25px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
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

        @media (max-width: 700px) {

            .resumen {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 14px;
            }

            .botones {
                flex-direction: column;
            }

            .boton {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <!-- INFORMACIÓN DEL PROYECTO -->

    <div class="tarjeta">

        <h1>
            Estimación del proyecto
        </h1>

        <p class="subtitulo">
            Resultado preliminar generado por ObraSmart.
        </p>

        <h2>
            {{ $proyecto->nombre }}
        </h2>

        @if ($proyecto->descripcion)

            <p>
                {{ $proyecto->descripcion }}
            </p>

        @endif

        <div class="resumen">

            <!-- TIPO DE TRABAJO -->

            <div class="dato">

                <span>
                    Tipo de trabajo
                </span>

                <strong>
                    {{ $proyecto->tipoTrabajo->nombre }}
                </strong>

            </div>

            <!-- MAGNITUD -->

            <div class="dato">

                <span>
                    Magnitud
                </span>

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

            <!-- TIEMPO -->

            <div class="dato">

                <span>
                    Tiempo estimado
                </span>

                <strong>

                    {{ number_format(
                        (float) $estimacion->tiempo_estimado,
                        2,
                        ',',
                        '.'
                    ) }}

                    días

                </strong>

            </div>

        </div>

    </div>

    <!-- MATERIALES -->

    <div class="tarjeta">

        <h2>
            Materiales
        </h2>

        @if ($estimacion->detalles->count() > 0)

            <table>

                <thead>

                    <tr>

                        <th>
                            Material
                        </th>

                        <th>
                            Cantidad
                        </th>

                        <th>
                            Rendimiento
                        </th>

                        <th>
                            Precio unitario
                        </th>

                        <th>
                            Subtotal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($estimacion->detalles as $detalle)

                        <tr>

                            <!-- MATERIAL -->

                            <td>
                                {{ $detalle->material->nombre }}
                            </td>

                            <!-- CANTIDAD -->

                            <td>

                                {{ rtrim(
                                    rtrim(
                                        number_format(
                                            (float) $detalle->cantidad,
                                            2,
                                            ',',
                                            '.'
                                        ),
                                        '0'
                                    ),
                                    ','
                                ) }}

                                {{ $detalle->material->unidad }}

                            </td>

                            <!-- RENDIMIENTO -->

                            <td>

                                {{ rtrim(
                                    rtrim(
                                        number_format(
                                            (float) $detalle->rendimiento,
                                            2,
                                            ',',
                                            '.'
                                        ),
                                        '0'
                                    ),
                                    ','
                                ) }}

                            </td>

                            <!-- PRECIO UNITARIO -->

                            <td>

                                ${{ number_format(
                                    (float) $detalle->precio_unitario,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                            <!-- SUBTOTAL -->

                            <td>

                                ${{ number_format(
                                    (float) $detalle->subtotal,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <p>
                No hay materiales disponibles para calcular.
            </p>

        @endif

    </div>

    <!-- RESUMEN DE COSTOS -->

    <div class="tarjeta">

        <h2>
            Resumen de costos
        </h2>

        <div class="resumen">

            <!-- COSTO DE MATERIALES -->

            <div class="dato">

                <span>
                    Costo de materiales
                </span>

                <strong>

                    ${{ number_format(
                        (float) $estimacion->costo_materiales,
                        0,
                        ',',
                        '.'
                    ) }}

                </strong>

            </div>

            <!-- MANO DE OBRA -->

            <div class="dato">

                <span>
                    Mano de obra
                </span>

                <strong>

                    ${{ number_format(
                        (float) $estimacion->costo_mano_obra,
                        0,
                        ',',
                        '.'
                    ) }}

                </strong>

            </div>

            <!-- TIEMPO -->

            <div class="dato">

                <span>
                    Tiempo estimado
                </span>

                <strong>

                    {{ number_format(
                        (float) $estimacion->tiempo_estimado,
                        2,
                        ',',
                        '.'
                    ) }}

                    días

                </strong>

            </div>

        </div>

        <!-- COSTO TOTAL -->

        <div class="total">

            <span>
                COSTO TOTAL ESTIMADO
            </span>

            <strong>

                ${{ number_format(
                    (float) $estimacion->costo_total,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>

        <!-- BOTONES -->

        <div class="botones">

            <!-- GENERAR PRESUPUESTO -->

            <a
                href="{{ route('proyectos.presupuesto', $proyecto->id) }}"
                class="boton principal"
            >
                Generar presupuesto
            </a>

            <!-- CREAR OTRO PROYECTO -->

            <a
                href="{{ route('proyectos.crear') }}"
                class="boton secundario"
            >
                Crear otro proyecto
            </a>

            <!-- VOLVER AL DASHBOARD -->

            <a
                href="{{ route('dashboard') }}"
                class="boton secundario"
            >
                Volver al Dashboard
            </a>

        </div>

    </div>

</div>

</body>
</html>