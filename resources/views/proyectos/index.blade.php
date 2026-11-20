<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ENCABEZADO --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Mis proyectos
                    </h1>

                    <p class="mt-1 text-gray-600">
                        Consulta y administra tus proyectos de construcción y remodelación.
                    </p>
                </div>

                <a
                    href="{{ route('proyectos.crear') }}"
                    style="background-color: #2563eb; color: white;"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-lg font-semibold hover:opacity-90 transition"
                >
                    + Nuevo proyecto
                </a>

            </div>


            {{-- MENSAJE DE ÉXITO --}}
            @if(session('success'))

                <div
                    style="background-color: #dcfce7; color: #166534; border: 1px solid #86efac;"
                    class="mb-6 px-4 py-3 rounded-lg"
                >
                    {{ session('success') }}
                </div>

            @endif


            {{-- SI NO HAY PROYECTOS --}}
            @if($proyectos->isEmpty())

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-10 text-center">

                    <div class="text-5xl mb-4">
                        🏗️
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800">
                        No tienes proyectos todavía
                    </h2>

                    <p class="mt-2 text-gray-600">
                        Crea tu primer proyecto para comenzar a generar estimaciones.
                    </p>

                    <div class="mt-6">

                        <a
                            href="{{ route('proyectos.crear') }}"
                            style="background-color: #2563eb; color: white;"
                            class="inline-flex items-center justify-center px-5 py-3 rounded-lg font-semibold hover:opacity-90 transition"
                        >
                            Crear mi primer proyecto
                        </a>

                    </div>

                </div>

            @else

                {{-- TARJETAS DE PROYECTOS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($proyectos as $proyecto)

                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">

                            {{-- ENCABEZADO --}}
                            <div class="px-6 py-5 border-b border-gray-200">

                                <div class="flex items-start justify-between gap-3">

                                    <div>

                                        <h2 class="text-xl font-bold text-gray-800">
                                            {{ $proyecto->nombre }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-500">
                                            Proyecto #{{ $proyecto->id }}
                                        </p>

                                    </div>

                                    <span
                                        style="background-color: #dcfce7; color: #166534;"
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold"
                                    >
                                        {{ $proyecto->estado }}
                                    </span>

                                </div>

                            </div>


                            {{-- INFORMACIÓN --}}
                            <div class="px-6 py-5 flex-1">

                                <div class="space-y-4">

                                    {{-- TIPO DE TRABAJO --}}
                                    <div>

                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Tipo de trabajo
                                        </p>

                                        <p class="mt-1 text-gray-800 font-medium">
                                            {{ $proyecto->tipoTrabajo->nombre ?? 'Sin tipo de trabajo' }}
                                        </p>

                                    </div>


                                    {{-- DESCRIPCIÓN --}}
                                    @if($proyecto->descripcion)

                                        <div>

                                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Descripción
                                            </p>

                                            <p class="mt-1 text-sm text-gray-600">
                                                {{ $proyecto->descripcion }}
                                            </p>

                                        </div>

                                    @endif


                                    {{-- DIMENSIONES --}}
                                    <div>

                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Dimensiones
                                        </p>

                                        <div class="mt-2 grid grid-cols-3 gap-2">

                                            <div
                                                style="background-color: #f3f4f6;"
                                                class="rounded-lg p-3 text-center"
                                            >
                                                <p class="text-xs text-gray-500">
                                                    Largo
                                                </p>

                                                <p class="font-semibold text-gray-800">
                                                    @if($proyecto->largo !== null)
                                                        {{ rtrim(rtrim(number_format((float) $proyecto->largo, 2, '.', ''), '0'), '.') }}
                                                        {{ $proyecto->unidad_medida }}
                                                    @else
                                                        —
                                                    @endif
                                                </p>

                                            </div>


                                            <div
                                                style="background-color: #f3f4f6;"
                                                class="rounded-lg p-3 text-center"
                                            >
                                                <p class="text-xs text-gray-500">
                                                    Ancho
                                                </p>

                                                <p class="font-semibold text-gray-800">
                                                    @if($proyecto->ancho !== null)
                                                        {{ rtrim(rtrim(number_format((float) $proyecto->ancho, 2, '.', ''), '0'), '.') }}
                                                        {{ $proyecto->unidad_medida }}
                                                    @else
                                                        —
                                                    @endif
                                                </p>

                                            </div>


                                            <div
                                                style="background-color: #f3f4f6;"
                                                class="rounded-lg p-3 text-center"
                                            >
                                                <p class="text-xs text-gray-500">
                                                    Alto
                                                </p>

                                                <p class="font-semibold text-gray-800">
                                                    @if($proyecto->alto !== null)
                                                        {{ rtrim(rtrim(number_format((float) $proyecto->alto, 2, '.', ''), '0'), '.') }}
                                                        {{ $proyecto->unidad_medida }}
                                                    @else
                                                        —
                                                    @endif
                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- FECHA --}}
                                    <div>

                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Creado
                                        </p>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ $proyecto->created_at->format('d/m/Y H:i') }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- BOTONES --}}
                            <div
                                style="background-color: #f9fafb;"
                                class="border-t border-gray-200 px-6 py-4"
                            >

                                <div class="grid grid-cols-2 gap-2">

                                    {{-- VER ESTIMACIÓN --}}
                                    <a
                                        href="{{ route('proyectos.estimacion', $proyecto->id) }}"
                                        style="background-color: #4f46e5; color: white;"
                                        class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                    >
                                        Ver estimación
                                    </a>


                                    {{-- HISTORIAL --}}
                                    <a
                                        href="{{ route('proyectos.historial', $proyecto->id) }}"
                                        style="background-color: #9333ea; color: white;"
                                        class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                    >
                                        Historial
                                    </a>


                                    {{-- EDITAR --}}
                                    <a
                                        href="{{ route('proyectos.editar', $proyecto->id) }}"
                                        style="background-color: #f59e0b; color: white;"
                                        class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                    >
                                        Editar
                                    </a>


                                    {{-- ELIMINAR --}}
                                    <form
                                        action="{{ route('proyectos.eliminar', $proyecto->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            style="background-color: #dc2626; color: white;"
                                            class="w-full inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                        >
                                            Eliminar
                                        </button>

                                    </form>

                                </div>


                                {{-- PRESUPUESTO --}}
                                <div class="mt-2">

                                    <a
                                        href="{{ route('proyectos.presupuesto', $proyecto->id) }}"
                                        style="background-color: #16a34a; color: white;"
                                        class="w-full inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                    >
                                        Generar presupuesto
                                    </a>

                                </div>


                                {{-- NUEVO: CRONOGRAMA GANTT --}}
                                <div class="mt-2">

                                    <a
                                        href="{{ route('proyectos.gantt', $proyecto->id) }}"
                                        style="background-color: #0f766e; color: white;"
                                        class="w-full inline-flex justify-center items-center px-3 py-2 text-sm font-semibold rounded-lg hover:opacity-90 transition"
                                    >
                                        📊 Ver cronograma de obra
                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</x-app-layout>