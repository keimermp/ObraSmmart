<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Presupuesto - ObraSmart</title>

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

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #2563eb;
        }

        .fecha {
            color: #6b7280;
            font-size: 14px;
            text-align: right;
        }

        h1 {
            margin: 25px 0 5px;
            color: #1f2937;
        }

        h2 {
            color: #374151;
            margin-top: 0;
        }

        .subtitulo {
            color: #6b7280;
            margin-top: 5px;
        }

        .datos {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .dato {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 15px;
            border-radius: 8px;
        }

        .dato span {
            display: block;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .dato strong {
            color: #111827;
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

        .resumen {
            margin-top: 25px;
        }

        .fila {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .fila strong {
            color: #111827;
        }

        .total {
            margin-top: 20px;
            padding: 20px;
            background: #eff6ff;
            border: 2px solid #2563eb;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total span {
            font-size: 18px;
            font-weight: bold;
            color: #374151;
        }

        .total strong {
            font-size: 28px;
            color: #2563eb;
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
            border: none;
            cursor: pointer;
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

            .datos {
                grid-template-columns: 1fr;
            }

            .encabezado {
                flex-direction: column;
            }

            .fecha {
                text-align: left;
            }

            table {
                font-size: 14px;
            }

            .total {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .botones {
                flex-direction: column;
            }

            .boton {
                text-align: center;
            }
        }

        @media print {

            body {
                background: white;
            }

            .contenedor {
                width: 100%;
                max-width: none;
                margin: 0;
            }

            .tarjeta {
                box-shadow: none;
                border-radius: 0;
                margin-bottom: 15px;
                padding: 20px;
            }

            .botones {
                display: none;
            }

            .total {
                break-inside: avoid;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
            }

            th {
                background: #f1f1f1 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <!-- ENCABEZADO -->

    <div class="tarjeta">

        <div class="encabezado">

            <div>

                <div class="logo">
                    ObraSmart
                </div>

                <p class="subtitulo">
                    Sistema de estimación y planificación de trabajos
                </p>

            </div>

            <div class="fecha">

                Fecha de estimación<br>

                <strong>
                    {{ $estimacion->fecha->format('d/m/Y') }}
                </strong>

            </div>

        </div>


        <h1>
            Presupuesto preliminar
        </h1>

        <h2>
            {{ $proyecto->nombre }}
        </h2>


        @if ($proyecto->descripcion)

            <p>
                {{ $proyecto->descripcion }}
            </p>

        @endif


        <div class="datos">

            <div class="dato">

                <span>
                    Tipo de trabajo
                </span>

                <strong>
                    {{ $proyecto->tipoTrabajo->nombre }}
                </strong>

            </div>


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

                </strong>

            </div>


            <div class="dato">

                <span>
                    Unidad de medida
                </span>

                <strong>
                    {{ $proyecto->unidad_medida }}
                </strong>

            </div>

        </div>

    </div>


    <!-- MATERIALES -->

    <div class="tarjeta">

        <h2>
            Detalle de materiales
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

                            <td>
                                {{ $detalle->material->nombre }}
                            </td>


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


                            <td>

                                ${{ number_format(
                                    (float) $detalle->precio_unitario,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


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
                No hay materiales registrados en esta estimación.
            </p>

        @endif

    </div>


    <!-- RESUMEN -->

    <div class="tarjeta">

        <h2>
            Resumen del presupuesto
        </h2>


        <div class="resumen">

            <div class="fila">

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


            <div class="fila">

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

        </div>

    </div>


    <!-- BOTONES -->

    <div class="botones">

        <button
            type="button"
            class="boton principal"
            onclick="window.print()"
        >
            🖨️ Imprimir / Guardar PDF
        </button>


        <a
            href="{{ route('proyectos.estimacion', $proyecto->id) }}"
            class="boton secundario"
        >
            Volver a la estimación
        </a>


        <a
            href="{{ route('proyectos.index') }}"
            class="boton secundario"
        >
            Mis proyectos
        </a>

    </div>

</div>

</body>
</html>