<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tipos de trabajo
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Administración de trabajos de construcción y remodelación.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ENCABEZADO --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Tipos de trabajo
                    </h1>

                    <p class="text-gray-600 mt-2">
                        Configura magnitudes, tarifas, productividad y materiales.
                    </p>
                </div>

                <a
                    href="{{ route('tipos-trabajo.crear') }}"
                    style="
                        background-color: #2563eb;
                        color: white;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        height: 42px;
                        padding: 0 18px;
                        border-radius: 7px;
                        font-weight: 600;
                        text-decoration: none;
                        white-space: nowrap;
                    "
                >
                    + Nuevo tipo de trabajo
                </a>

            </div>

            {{-- MENSAJE DE ÉXITO --}}
            @if (session('success'))
                <div
                    style="
                        background-color: #dcfce7;
                        color: #166534;
                        border: 1px solid #86efac;
                        padding: 14px 18px;
                        border-radius: 8px;
                        margin-bottom: 24px;
                    "
                >
                    {{ session('success') }}
                </div>
            @endif

            {{-- LISTA DE TIPOS DE TRABAJO --}}
            @forelse ($tiposTrabajo as $tipo)

                <div
                    class="bg-white shadow-sm rounded-xl mb-6 overflow-hidden"
                    style="border: 1px solid #e5e7eb;"
                >

                    {{-- CABECERA --}}
                    <div
                        class="px-6 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4"
                        style="border-bottom: 1px solid #e5e7eb;"
                    >

                        <div>
                            <h2 class="text-xl font-bold text-gray-800">
                                {{ $tipo->nombre }}
                            </h2>

                            @if ($tipo->descripcion)
                                <p class="text-gray-500 mt-1">
                                    {{ $tipo->descripcion }}
                                </p>
                            @else
                                <p class="text-gray-400 mt-1">
                                    Sin descripción
                                </p>
                            @endif
                        </div>

                        {{-- ESTADO --}}
                        <div>
                            @if ($tipo->activo)
                                <span
                                    style="
                                        background-color: #dcfce7;
                                        color: #166534;
                                        padding: 6px 12px;
                                        border-radius: 999px;
                                        font-size: 13px;
                                        font-weight: 600;
                                    "
                                >
                                    Activo
                                </span>
                            @else
                                <span
                                    style="
                                        background-color: #fee2e2;
                                        color: #991b1b;
                                        padding: 6px 12px;
                                        border-radius: 999px;
                                        font-size: 13px;
                                        font-weight: 600;
                                    "
                                >
                                    Inactivo
                                </span>
                            @endif
                        </div>

                    </div>

                    {{-- INFORMACIÓN --}}
                    <div class="p-6">

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                            {{-- MAGNITUD --}}
                            <div
                                style="
                                    background-color: #f9fafb;
                                    border: 1px solid #e5e7eb;
                                    border-radius: 8px;
                                    padding: 16px;
                                "
                            >
                                <p class="text-xs font-semibold text-gray-500 uppercase">
                                    Magnitud
                                </p>

                                <p class="text-lg font-bold text-gray-800 mt-2">
                                    {{ $tipo->tipo_magnitud }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Unidad: {{ $tipo->unidad_magnitud }}
                                </p>
                            </div>

                            {{-- MANO DE OBRA --}}
                            <div
                                style="
                                    background-color: #f9fafb;
                                    border: 1px solid #e5e7eb;
                                    border-radius: 8px;
                                    padding: 16px;
                                "
                            >
                                <p class="text-xs font-semibold text-gray-500 uppercase">
                                    Mano de obra
                                </p>

                                <p class="text-lg font-bold text-gray-800 mt-2">
                                    ${{ number_format($tipo->tarifa_mano_obra, 2, ',', '.') }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Por unidad de magnitud
                                </p>
                            </div>

                            {{-- PRODUCTIVIDAD --}}
                            <div
                                style="
                                    background-color: #f9fafb;
                                    border: 1px solid #e5e7eb;
                                    border-radius: 8px;
                                    padding: 16px;
                                "
                            >
                                <p class="text-xs font-semibold text-gray-500 uppercase">
                                    Productividad
                                </p>

                                <p class="text-lg font-bold text-gray-800 mt-2">

                                    @if ($tipo->unidad_tiempo && $tipo->productividad > 0)

                                        {{ number_format($tipo->productividad, 2, ',', '.') }}

                                        {{ $tipo->unidad_magnitud }}/{{ $tipo->unidad_tiempo === 'DIA' ? 'día' : 'hora' }}

                                    @else

                                        {{ number_format($tipo->productividad, 2, ',', '.') }}

                                        <span class="text-sm text-red-600">
                                            Sin unidad de tiempo
                                        </span>

                                    @endif

                                </p>

                                <p class="text-sm text-gray-500 mt-1">

                                    @if ($tipo->unidad_tiempo === 'DIA')
                                        Unidades realizadas por día.
                                    @elseif ($tipo->unidad_tiempo === 'HORA')
                                        Unidades realizadas por hora.
                                    @else
                                        Edita este trabajo para configurar su unidad de tiempo.
                                    @endif

                                </p>
                            </div>

                            {{-- CANTIDAD DE MATERIALES --}}
                            <div
                                style="
                                    background-color: #f9fafb;
                                    border: 1px solid #e5e7eb;
                                    border-radius: 8px;
                                    padding: 16px;
                                "
                            >
                                <p class="text-xs font-semibold text-gray-500 uppercase">
                                    Materiales
                                </p>

                                <p class="text-lg font-bold text-gray-800 mt-2">
                                    {{ $tipo->materiales->count() }}
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Material(es) asociado(s)
                                </p>
                            </div>

                        </div>

                        {{-- MATERIALES --}}
                        <div class="mt-6">

                            <h3 class="text-sm font-bold text-gray-700 mb-3">
                                Materiales utilizados
                            </h3>

                            @if ($tipo->materiales->count() > 0)

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

                                    @foreach ($tipo->materiales as $material)

                                        <div
                                            style="
                                                border: 1px solid #e5e7eb;
                                                border-radius: 8px;
                                                padding: 12px 14px;
                                                background-color: white;
                                            "
                                        >
                                            <div class="font-semibold text-gray-800">
                                                {{ $material->nombre }}
                                            </div>

                                            <div class="text-sm text-gray-500 mt-1">
                                                Unidad: {{ $material->unidad }}
                                            </div>

                                            <div class="text-sm text-gray-600 mt-1">
                                                Rendimiento:

                                                <strong>
                                                    {{ number_format($material->pivot->rendimiento, 2, ',', '.') }}
                                                </strong>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>

                            @else

                                <div
                                    style="
                                        background-color: #fef3c7;
                                        color: #92400e;
                                        border: 1px solid #fcd34d;
                                        padding: 12px 16px;
                                        border-radius: 8px;
                                    "
                                >
                                    Este tipo de trabajo no tiene materiales asociados.
                                </div>

                            @endif

                        </div>

                        {{-- ACCIONES --}}
                        <div
                            class="mt-6 pt-5 flex flex-col sm:flex-row sm:justify-end gap-3"
                            style="border-top: 1px solid #e5e7eb;"
                        >

                            {{-- EDITAR --}}
                            <a
                                href="{{ route('tipos-trabajo.editar', $tipo->id) }}"
                                style="
                                    background-color: #eab308;
                                    color: white;
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    height: 40px;
                                    padding: 0 18px;
                                    border-radius: 7px;
                                    font-weight: 600;
                                    text-decoration: none;
                                "
                            >
                                Editar
                            </a>

                            {{-- ACTIVAR / DESACTIVAR --}}
                            <form
                                action="{{ route('tipos-trabajo.estado', $tipo->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    style="
                                        background-color: {{ $tipo->activo ? '#dc2626' : '#16a34a' }};
                                        color: white;
                                        display: inline-flex;
                                        align-items: center;
                                        justify-content: center;
                                        height: 40px;
                                        padding: 0 18px;
                                        border-radius: 7px;
                                        font-weight: 600;
                                        border: none;
                                        cursor: pointer;
                                        width: 100%;
                                    "
                                >
                                    {{ $tipo->activo ? 'Desactivar' : 'Activar' }}
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                {{-- SIN TIPOS DE TRABAJO --}}
                <div
                    class="bg-white rounded-xl shadow-sm p-10 text-center"
                    style="border: 1px solid #e5e7eb;"
                >
                    <h3 class="text-xl font-bold text-gray-800">
                        No hay tipos de trabajo
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Todavía no has registrado ningún tipo de trabajo.
                    </p>

                    <a
                        href="{{ route('tipos-trabajo.crear') }}"
                        style="
                            background-color: #2563eb;
                            color: white;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            height: 40px;
                            padding: 0 18px;
                            border-radius: 7px;
                            font-weight: 600;
                            text-decoration: none;
                            margin-top: 20px;
                        "
                    >
                        + Crear tipo de trabajo
                    </a>
                </div>

            @endforelse

        </div>
    </div>

</x-app-layout>