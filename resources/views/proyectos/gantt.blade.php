<x-app-layout>
    <style>
        .gantt-page {
            color: #1e293b;
        }

        .gantt-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .gantt-input {
            width: 100%;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 13px;
            background: #fff;
            transition: .2s;
        }

        .gantt-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .gantt-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 7px;
        }

        .gantt-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
            cursor: pointer;
        }

        .gantt-btn-primary {
            background: #2563eb;
            color: white;
        }

        .gantt-btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .gantt-btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .gantt-btn-secondary:hover {
            background: #e2e8f0;
        }

        /* TARJETAS DE ESTADÍSTICAS */
        .gantt-stat {
            padding: 19px;
            border: 1px solid #e8edf4;
            border-radius: 14px;
            background: white;
        }

        .gantt-stat-number {
            font-size: 27px;
            font-weight: 750;
            letter-spacing: -1px;
            margin-top: 8px;
        }

        /* DIAGRAMA DE GANTT */
        .gantt-timeline {
            overflow-x: auto;
            padding-bottom: 12px;
        }

        .gantt-timeline-inner {
            min-width: 850px;
        }

        .gantt-row {
            display: grid;
            grid-template-columns: 250px minmax(600px, 1fr);
            border-bottom: 1px solid #edf1f5;
            min-height: 86px;
        }

        .gantt-row:last-child {
            border-bottom: none;
        }

        .gantt-timeline-area {
            position: relative;
            min-height: 86px;
            background-image: repeating-linear-gradient(
                to right,
                transparent 0,
                transparent calc(100% / var(--weeks) - 1px),
                #e8edf4 calc(100% / var(--weeks) - 1px),
                #e8edf4 calc(100% / var(--weeks))
            );
        }

        .gantt-bar {
            position: absolute;
            top: 29px;
            height: 27px;
            border-radius: 7px;
            overflow: hidden;
            min-width: 8px;
            box-shadow: 0 2px 5px rgba(15, 23, 42, .12);
        }

        .gantt-bar-progress {
            height: 100%;
            border-radius: 7px;
            transition: width .3s;
        }

        .gantt-week-header {
            display: grid;
            grid-template-columns: repeat(var(--weeks), minmax(0, 1fr));
        }

        .gantt-week {
            padding: 12px 5px;
            text-align: center;
            border-left: 1px solid #e8edf4;
            background: #f8fafc;
        }

        .gantt-week:first-child {
            border-left: none;
        }

        /* ETIQUETAS DE ESTADO */
        .gantt-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 20px;
            padding: 4px 8px;
            font-size: 10px;
            font-weight: 700;
        }

        .gantt-status-completed {
            background: #dcfce7;
            color: #15803d;
        }

        .gantt-status-progress {
            background: #fef3c7;
            color: #b45309;
        }

        .gantt-status-pending {
            background: #f1f5f9;
            color: #64748b;
        }

        .gantt-action {
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .gantt-action-edit {
            color: #2563eb;
        }

        .gantt-action-delete {
            color: #dc2626;
        }

        /* LEYENDA PROFESIONAL */
        .gantt-legend-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-top: 18px;
        }

        .gantt-legend-card {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 17px;
            border-radius: 12px;
            border: 1px solid;
            min-height: 76px;
        }

        .gantt-legend-card.completed {
            background: #ecfdf3 !important;
            border-color: #bbf7d0 !important;
        }

        .gantt-legend-card.progress {
            background: #fffbeb !important;
            border-color: #fde68a !important;
        }

        .gantt-legend-card.pending {
            background: #f1f5f9 !important;
            border-color: #cbd5e1 !important;
        }

        .gantt-legend-dot {
            width: 13px;
            height: 13px;
            min-width: 13px;
            border-radius: 50%;
        }

        .gantt-legend-dot.completed {
            background: #16a34a !important;
        }

        .gantt-legend-dot.progress {
            background: #d97706 !important;
        }

        .gantt-legend-dot.pending {
            background: #64748b !important;
        }

        .gantt-legend-title {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .gantt-legend-description {
            font-size: 11px;
        }

        .gantt-legend-card.completed .gantt-legend-title,
        .gantt-legend-card.completed .gantt-legend-description {
            color: #166534 !important;
        }

        .gantt-legend-card.progress .gantt-legend-title,
        .gantt-legend-card.progress .gantt-legend-description {
            color: #92400e !important;
        }

        .gantt-legend-card.pending .gantt-legend-title,
        .gantt-legend-card.pending .gantt-legend-description {
            color: #475569 !important;
        }

        .gantt-legend-note {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 18px;
            padding: 12px 15px;
            border-radius: 9px;
            background: #eff6ff !important;
            color: #1d4ed8 !important;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            .gantt-legend-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .gantt-stat-number {
                font-size: 23px;
            }

            .gantt-row {
                grid-template-columns: 190px minmax(600px, 1fr);
            }
        }
    </style>

    <div class="py-8 gantt-page">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ENCABEZADO --}}
            <div class="gantt-card p-6 mb-6">
                <div class="flex flex-wrap justify-between items-center gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-blue-600">
                                Gestión de proyectos
                            </span>
                            <span class="text-gray-300">/</span>
                            <span class="text-xs text-gray-500">Cronograma</span>
                        </div>

                        <h1 class="text-2xl font-bold text-gray-900">
                            Cronograma de obra
                        </h1>

                        <p class="text-sm text-gray-500 mt-2">
                            {{ $proyecto->nombre }}
                        </p>

                        <p class="text-xs text-gray-400 mt-1">
                            {{ $proyecto->tipoTrabajo->nombre ?? 'Sin tipo de trabajo' }}
                        </p>
                    </div>

                    <a href="{{ route('proyectos.index') }}"
                       class="gantt-btn gantt-btn-secondary">
                        ← Volver a proyectos
                    </a>
                </div>

                @php
                    $totalActividades = $tareas->count();

                    $completadas = $tareas->filter(function ($tarea) {
                        return (float) $tarea->porcentaje_avance >= 100;
                    })->count();

                    $enProgreso = $tareas->filter(function ($tarea) {
                        $avance = (float) $tarea->porcentaje_avance;
                        return $avance > 0 && $avance < 100;
                    })->count();

                    $pendientes = $tareas->filter(function ($tarea) {
                        return (float) $tarea->porcentaje_avance <= 0;
                    })->count();

                    // Duración estimada en jornadas laborales.
                    $duracionEstimadaDias = $estimacion
                        ? (float) $estimacion->tiempo_estimado
                        : null;

                    // Fechas de las actividades programadas.
                    $fechaInicioProgramada = null;
                    $fechaFinProgramada = null;
                    $diasProgramados = 0;

                    if ($tareas->count() > 0) {
                        $fechaInicioProgramada = \Carbon\Carbon::parse(
                            $tareas->min('fecha_inicio')
                        );

                        $fechaFinProgramada = \Carbon\Carbon::parse(
                            $tareas->max('fecha_fin')
                        );

                        $periodo = \Carbon\CarbonPeriod::create(
                            $fechaInicioProgramada,
                            $fechaFinProgramada
                        );

                        foreach ($periodo as $dia) {
                            if ($dia->isWeekday()) {
                                $diasProgramados++;
                            }
                        }
                    }

                    // Comparar duración estimada y programada.
                    $excedeEstimacion = $duracionEstimadaDias !== null
                        && $diasProgramados > $duracionEstimadaDias;

                    // Calcular fecha de finalización sugerida.
                    $fechaFinSugerida = null;

                    if (
                        $duracionEstimadaDias !== null &&
                        $fechaInicioProgramada !== null &&
                        $duracionEstimadaDias > 0
                    ) {
                        $diasNecesarios = (int) ceil($duracionEstimadaDias);

                        $fechaFinSugerida = $fechaInicioProgramada->copy();

                        // Si el inicio cae en fin de semana, avanzar al lunes.
                        while (!$fechaFinSugerida->isWeekday()) {
                            $fechaFinSugerida->addDay();
                        }

                        // Contar jornadas laborales.
                        $diasNecesarios--;

                        while ($diasNecesarios > 0) {
                            $fechaFinSugerida->addDay();

                            if ($fechaFinSugerida->isWeekday()) {
                                $diasNecesarios--;
                            }
                        }
                    }
                @endphp

                {{-- TARJETAS DE RESUMEN --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-7">

                    <div class="gantt-stat">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-500">Avance general</span>
                            <span class="text-blue-600 text-lg">◉</span>
                        </div>

                        <div class="gantt-stat-number text-blue-600">
                            {{ number_format($avanceGeneral, 1) }}%
                        </div>

                        <div class="w-full h-2 bg-gray-100 rounded-full mt-3 overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full"
                                 style="width: {{ min(100, max(0, $avanceGeneral)) }}%">
                            </div>
                        </div>
                    </div>

                    <div class="gantt-stat">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-500">Total actividades</span>
                            <span class="text-blue-600 text-lg">▤</span>
                        </div>

                        <div class="gantt-stat-number text-gray-800">
                            {{ $totalActividades }}
                        </div>

                        <p class="text-xs text-gray-400 mt-2">
                            Actividades planificadas
                        </p>
                    </div>

                    <div class="gantt-stat">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-500">Completadas</span>
                            <span class="text-green-600 text-lg">✓</span>
                        </div>

                        <div class="gantt-stat-number text-green-600">
                            {{ $completadas }}
                        </div>

                        <p class="text-xs text-gray-400 mt-2">
                            Actividades finalizadas
                        </p>
                    </div>

                    <div class="gantt-stat">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-500">Pendientes</span>
                            <span class="text-amber-500 text-lg">◷</span>
                        </div>

                        <div class="gantt-stat-number text-amber-600">
                            {{ $pendientes + $enProgreso }}
                        </div>

                        <p class="text-xs text-gray-400 mt-2">
                            {{ $enProgreso }} en progreso · {{ $pendientes }} sin iniciar
                        </p>
                    </div>

                </div>

                                {{-- RESUMEN DE DURACIÓN --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">

                    <div class="gantt-stat">
                        <span class="text-xs font-semibold text-gray-500">
                            Duración estimada
                        </span>

                        <div class="gantt-stat-number text-blue-600">
                            @if($duracionEstimadaDias !== null)
                                {{ number_format($duracionEstimadaDias, 2, ',', '.') }}
                                <span class="text-sm">días</span>
                            @else
                                Sin estimación
                            @endif
                        </div>

                        <p class="text-xs text-gray-400 mt-2">
                            Jornadas laborales de 8 horas
                        </p>
                    </div>

                    <div class="gantt-stat">
                        <span class="text-xs font-semibold text-gray-500">
                            Duración programada
                        </span>

                        <div class="gantt-stat-number text-gray-800">
                            {{ $diasProgramados }}
                            <span class="text-sm">días</span>
                        </div>

                        <p class="text-xs text-gray-400 mt-2">
                            Días laborables entre la primera y última actividad
                        </p>
                    </div>

                    <div class="gantt-stat">
                        <span class="text-xs font-semibold text-gray-500">
                            Cumplimiento del plazo
                        </span>

                        @if($duracionEstimadaDias === null)
                            <div class="gantt-stat-number text-gray-500">
                                No disponible
                            </div>

                            <p class="text-xs text-gray-400 mt-2">
                                El proyecto todavía no tiene una estimación.
                            </p>

                        @elseif($excedeEstimacion)
                            <div class="gantt-stat-number text-red-600">
                                Excede el plazo
                            </div>

                            <p class="text-xs text-red-500 mt-2">
                                La programación supera la duración estimada.
                            </p>

                        @else
                            <div class="gantt-stat-number text-green-600">
                                Dentro del plazo
                            </div>

                            <p class="text-xs text-gray-400 mt-2">
                                La programación está dentro del tiempo estimado.
                            </p>
                        @endif
                    </div>

                </div>

                {{-- FECHA DE FINALIZACIÓN SUGERIDA --}}
                <div class="gantt-stat mt-4">

                    <span class="text-xs font-semibold text-gray-500">
                        Fecha estimada de finalización
                    </span>

                    <div class="gantt-stat-number text-blue-600">
                        @if($fechaFinSugerida)
                            {{ $fechaFinSugerida->format('d/m/Y') }}
                        @else
                            Sin calcular
                        @endif
                    </div>

                    <p class="text-xs text-gray-400 mt-2">
                        Calculada a partir de la fecha de inicio y la duración estimada.
                        Se excluyen sábados y domingos.
                    </p>

                </div>

                {{-- ADVERTENCIA DE PLANIFICACIÓN --}}
                @if($excedeEstimacion)
                    <div class="mt-4 p-4 rounded-lg border border-amber-200 bg-amber-50 text-amber-800 text-sm">
                        <strong>Advertencia de planificación:</strong>

                        Las actividades abarcan {{ $diasProgramados }} días laborables,
                        mientras que la estimación de ObraSmart es de
                        {{ number_format($duracionEstimadaDias, 2, ',', '.') }} días.

                        Revisa las fechas programadas.
                    </div>
                @endif
            </div>

            {{-- MENSAJES --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-5 text-sm">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-5 text-sm">
                    <p class="font-bold mb-2">No se pudo guardar la información:</p>

                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORMULARIO NUEVA ACTIVIDAD --}}
            <div class="gantt-card p-6 mb-6">
                <div class="flex flex-wrap justify-between items-center gap-3 mb-5">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">
                            Registrar nueva actividad
                        </h2>

                        <p class="text-xs text-gray-400 mt-1">
                            Agrega las tareas necesarias para ejecutar la obra.
                        </p>
                    </div>

                    <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-2 rounded-lg">
                        Nueva actividad
                    </span>
                </div>

                <form action="{{ route('proyectos.tareas.guardar', $proyecto->id) }}"
                      method="POST">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="gantt-label">Nombre de la actividad *</label>

                            <input type="text"
                                   name="nombre"
                                   value="{{ old('nombre') }}"
                                   required
                                   maxlength="150"
                                   class="gantt-input"
                                   placeholder="Ej. Preparación del terreno">
                        </div>

                        <div>
                            <label class="gantt-label">Descripción</label>

                            <input type="text"
                                   name="descripcion"
                                   value="{{ old('descripcion') }}"
                                   class="gantt-input"
                                   placeholder="Describe brevemente la actividad">
                        </div>

                        <div>
                            <label class="gantt-label">Fecha de inicio *</label>

                            <input type="date"
                                   name="fecha_inicio"
                                   value="{{ old('fecha_inicio') }}"
                                   required
                                   class="gantt-input">
                        </div>

                        <div>
                            <label class="gantt-label">Fecha de finalización *</label>

                            <input type="date"
                                   name="fecha_fin"
                                   value="{{ old('fecha_fin') }}"
                                   required
                                   class="gantt-input">
                        </div>

                        <div>
                            <label class="gantt-label">Porcentaje de avance inicial *</label>

                            <input type="number"
                                   name="porcentaje_avance"
                                   value="{{ old('porcentaje_avance', 0) }}"
                                   min="0"
                                   max="100"
                                   step="0.01"
                                   required
                                   class="gantt-input">
                        </div>

                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="gantt-btn gantt-btn-primary">
                            + Agregar actividad
                        </button>
                    </div>
                </form>
            </div>

            {{-- DIAGRAMA DE GANTT --}}
            <div class="gantt-card p-6 mb-6">

                <div class="flex flex-wrap justify-between items-center gap-3 mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">
                            Diagrama de Gantt
                        </h2>

                        <p class="text-xs text-gray-400 mt-1">
                            Distribución temporal y seguimiento del avance de la obra.
                        </p>
                    </div>

                    <span class="text-xs text-gray-500 bg-gray-100 px-3 py-2 rounded-lg">
                        {{ $totalActividades }} actividades
                    </span>
                </div>

                @if($tareas->count() > 0)

                    @php
                        $fechaInicioProyecto = \Carbon\Carbon::parse($tareas->min('fecha_inicio'));
                        $fechaFinProyecto = \Carbon\Carbon::parse($tareas->max('fecha_fin'));

                        $inicio = $fechaInicioProyecto->copy()->startOfWeek();
                        $fin = $fechaFinProyecto->copy()->endOfWeek();

                        $totalDias = $inicio->diffInDays($fin) + 1;
                        $totalSemanas = (int) ceil($totalDias / 7);
                    @endphp

                    <div class="gantt-timeline">
                        <div class="gantt-timeline-inner">

                            {{-- CABECERA DE SEMANAS --}}
                            <div class="gantt-row" style="min-height: auto;">

                                <div class="p-4 bg-gray-50 rounded-tl-lg">
                                    <span class="text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Actividades
                                    </span>
                                </div>

                                <div class="gantt-week-header"
                                     style="--weeks: {{ $totalSemanas }};">

                                    @for($i = 0; $i < $totalSemanas; $i++)
                                        <div class="gantt-week">
                                            <p class="text-xs font-bold text-gray-700">
                                                Semana {{ $i + 1 }}
                                            </p>

                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ $inicio->copy()->addWeeks($i)->format('d/m') }}
                                            </p>
                                        </div>
                                    @endfor

                                </div>
                            </div>

                            {{-- ACTIVIDADES --}}
                            @foreach($tareas as $tarea)

                                @php
                                    $fechaInicio = \Carbon\Carbon::parse($tarea->fecha_inicio);
                                    $fechaFin = \Carbon\Carbon::parse($tarea->fecha_fin);

                                    $diasAntes = $inicio->diffInDays($fechaInicio);
                                    $duracion = $fechaInicio->diffInDays($fechaFin) + 1;

                                    $izquierda = ($diasAntes / $totalDias) * 100;
                                    $ancho = ($duracion / $totalDias) * 100;

                                    $avance = min(100, max(0, (float) $tarea->porcentaje_avance));

                                    if ($avance >= 100) {
                                        $color = '#16a34a';
                                        $estadoTexto = 'Completada';
                                        $estadoClase = 'gantt-status-completed';
                                    } elseif ($avance > 0) {
                                        $color = '#d97706';
                                        $estadoTexto = 'En progreso';
                                        $estadoClase = 'gantt-status-progress';
                                    } else {
                                        $color = '#64748b';
                                        $estadoTexto = 'Pendiente';
                                        $estadoClase = 'gantt-status-pending';
                                    }
                                @endphp

                                <div class="gantt-row">

                                    {{-- INFORMACIÓN DE ACTIVIDAD --}}
                                    <div class="p-4 flex flex-col justify-center">

                                        <p class="text-sm font-bold text-gray-800">
                                            {{ $tarea->nombre }}
                                        </p>

                                        @if($tarea->descripcion)
                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ $tarea->descripcion }}
                                            </p>
                                        @endif

                                        <div class="mt-2">
                                            <span class="gantt-status {{ $estadoClase }}">
                                                {{ $estadoTexto }}
                                            </span>
                                        </div>

                                        <div class="flex justify-between text-xs mt-2">
                                            <span class="text-gray-400">
                                                {{ $fechaInicio->format('d/m/Y') }}
                                            </span>

                                            <span class="font-bold text-gray-600">
                                                {{ number_format($avance, 0) }}%
                                            </span>
                                        </div>
                                    </div>

                                    {{-- BARRA DE TIEMPO --}}
                                    <div class="gantt-timeline-area"
                                         style="--weeks: {{ $totalSemanas }};">

                                        <div class="gantt-bar"
                                             title="{{ $tarea->nombre }}: {{ $avance }}% completado"
                                             style="
                                                left: {{ $izquierda }}%;
                                                width: {{ $ancho }}%;
                                                background-color: #e2e8f0;
                                             ">

                                            <div class="gantt-bar-progress"
                                                 style="
                                                    width: {{ $avance }}%;
                                                    background-color: {{ $color }};
                                                 ">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                                                {{-- ACCIONES --}}
                                <div class="flex items-center gap-4 px-4 py-2 bg-gray-50 border-b border-gray-100">

                                    <button type="button"
                                            onclick="document.getElementById('editar-{{ $tarea->id }}').classList.toggle('hidden')"
                                            class="gantt-action gantt-action-edit">
                                        ✎ Editar actividad
                                    </button>

                                    <form action="{{ route('proyectos.tareas.eliminar', [$proyecto->id, $tarea->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar esta actividad?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="gantt-action gantt-action-delete">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>

                                {{-- FORMULARIO DE EDICIÓN --}}
                                <div id="editar-{{ $tarea->id }}"
                                     class="hidden p-5 bg-blue-50 border-b border-blue-100">

                                    <form action="{{ route('proyectos.tareas.actualizar', [$proyecto->id, $tarea->id]) }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <h3 class="text-sm font-bold text-gray-800 mb-4">
                                            Editar actividad: {{ $tarea->nombre }}
                                        </h3>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                            <div>
                                                <label class="gantt-label">Nombre de la actividad</label>

                                                <input type="text"
                                                       name="nombre"
                                                       value="{{ $tarea->nombre }}"
                                                       required
                                                       maxlength="150"
                                                       class="gantt-input">
                                            </div>

                                            <div>
                                                <label class="gantt-label">Descripción</label>

                                                <input type="text"
                                                       name="descripcion"
                                                       value="{{ $tarea->descripcion }}"
                                                       class="gantt-input">
                                            </div>

                                            <div>
                                                <label class="gantt-label">Fecha de inicio</label>

                                                <input type="date"
                                                       name="fecha_inicio"
                                                       value="{{ $tarea->fecha_inicio->format('Y-m-d') }}"
                                                       required
                                                       class="gantt-input">
                                            </div>

                                            <div>
                                                <label class="gantt-label">Fecha de finalización</label>

                                                <input type="date"
                                                       name="fecha_fin"
                                                       value="{{ $tarea->fecha_fin->format('Y-m-d') }}"
                                                       required
                                                       class="gantt-input">
                                            </div>

                                            <div>
                                                <label class="gantt-label">Porcentaje de avance</label>

                                                <input type="number"
                                                       name="porcentaje_avance"
                                                       value="{{ $tarea->porcentaje_avance }}"
                                                       min="0"
                                                       max="100"
                                                       step="0.01"
                                                       required
                                                       class="gantt-input">
                                            </div>

                                        </div>

                                        <div class="flex gap-3 mt-5">

                                            <button type="submit"
                                                    class="gantt-btn gantt-btn-primary">
                                                Guardar cambios
                                            </button>

                                            <button type="button"
                                                    onclick="document.getElementById('editar-{{ $tarea->id }}').classList.add('hidden')"
                                                    class="gantt-btn gantt-btn-secondary">
                                                Cancelar
                                            </button>

                                        </div>
                                    </form>
                                </div>

                            @endforeach

                        </div>
                    </div>

                    {{-- LEYENDA DE ESTADOS --}}
                    <div class="mt-6 pt-6 border-t border-gray-100">

                        <div>
                            <h3 class="text-base font-bold text-gray-800">
                                Estados de las actividades
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                Clasificación del estado actual de ejecución de la obra.
                            </p>
                        </div>

                        <div class="gantt-legend-grid">

                            {{-- COMPLETADA --}}
                            <div class="gantt-legend-card completed">
                                <span class="gantt-legend-dot completed"></span>

                                <div>
                                    <p class="gantt-legend-title">
                                        Completada
                                    </p>

                                    <p class="gantt-legend-description">
                                        Actividad finalizada al 100%.
                                    </p>
                                </div>
                            </div>

                            {{-- EN PROGRESO --}}
                            <div class="gantt-legend-card progress">
                                <span class="gantt-legend-dot progress"></span>

                                <div>
                                    <p class="gantt-legend-title">
                                        En progreso
                                    </p>

                                    <p class="gantt-legend-description">
                                        Actividad actualmente en ejecución.
                                    </p>
                                </div>
                            </div>

                            {{-- PENDIENTE --}}
                            <div class="gantt-legend-card pending">
                                <span class="gantt-legend-dot pending"></span>

                                <div>
                                    <p class="gantt-legend-title">
                                        Pendiente
                                    </p>

                                    <p class="gantt-legend-description">
                                        Actividad que todavía no inicia.
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="gantt-legend-note">
                            <span style="font-size: 16px;">ⓘ</span>

                            <span>
                                La parte coloreada de cada barra representa el porcentaje de avance de la actividad.
                            </span>
                        </div>

                    </div>

                @else

                    {{-- ESTADO SIN ACTIVIDADES --}}
                    <div class="text-center py-16 bg-gray-50 rounded-xl border border-dashed border-gray-300">

                        <div class="text-4xl mb-3">📅</div>

                        <h3 class="font-bold text-gray-700">
                            Todavía no hay actividades
                        </h3>

                        <p class="text-sm text-gray-400 mt-2">
                            Registra la primera actividad para comenzar a construir tu cronograma.
                        </p>

                    </div>

                @endif

            </div>

            {{-- PIE DE PÁGINA --}}
            <div class="text-center text-xs text-gray-400 py-3">
                ObraSmart · Gestión y planificación inteligente de construcción
            </div>

        </div>
    </div>
</x-app-layout>