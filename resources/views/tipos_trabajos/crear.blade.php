<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo tipo de trabajo
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    Registrar tipo de trabajo
                </h1>

                <p class="text-gray-600 mb-6">
                    Configura las características del trabajo y los materiales necesarios.
                </p>

                {{-- Errores --}}
                @if ($errors->any())
                    <div style="
                        background-color: #fee2e2;
                        color: #991b1b;
                        border: 1px solid #fca5a5;
                        padding: 12px 16px;
                        border-radius: 6px;
                        margin-bottom: 20px;
                    ">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('tipos-trabajo.guardar') }}">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-6">
                        <label for="nombre" class="block font-semibold text-gray-700 mb-2">
                            Nombre del trabajo
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            value="{{ old('nombre') }}"
                            required
                            maxlength="150"
                            placeholder="Ej: Instalación de piso"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-6">
                        <label for="descripcion" class="block font-semibold text-gray-700 mb-2">
                            Descripción
                        </label>

                        <textarea
                            name="descripcion"
                            id="descripcion"
                            rows="3"
                            placeholder="Describe el trabajo..."
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >{{ old('descripcion') }}</textarea>
                    </div>

                    {{-- Tipo de magnitud --}}
                    <div class="mb-6">
                        <label for="tipo_magnitud" class="block font-semibold text-gray-700 mb-2">
                            Tipo de magnitud
                        </label>

                        <select
                            name="tipo_magnitud"
                            id="tipo_magnitud"
                            required
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >
                            <option value="">Selecciona una opción</option>

                            <option value="AREA_RECTANGULAR" {{ old('tipo_magnitud') == 'AREA_RECTANGULAR' ? 'selected' : '' }}>
                                Área rectangular
                            </option>

                            <option value="AREA_VERTICAL" {{ old('tipo_magnitud') == 'AREA_VERTICAL' ? 'selected' : '' }}>
                                Área vertical
                            </option>

                            <option value="VOLUMEN" {{ old('tipo_magnitud') == 'VOLUMEN' ? 'selected' : '' }}>
                                Volumen
                            </option>

                            <option value="LINEAL" {{ old('tipo_magnitud') == 'LINEAL' ? 'selected' : '' }}>
                                Lineal
                            </option>
                        </select>
                    </div>

                    {{-- Unidad de magnitud --}}
                    <div class="mb-6">
                        <label for="unidad_magnitud" class="block font-semibold text-gray-700 mb-2">
                            Unidad de magnitud
                        </label>

                        <input
                            type="text"
                            name="unidad_magnitud"
                            id="unidad_magnitud"
                            value="{{ old('unidad_magnitud') }}"
                            required
                            maxlength="10"
                            placeholder="Ej: m2"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >
                    </div>

                    {{-- Tarifa mano de obra --}}
                    <div class="mb-6">
                        <label for="tarifa_mano_obra" class="block font-semibold text-gray-700 mb-2">
                            Tarifa de mano de obra
                        </label>

                        <input
                            type="number"
                            name="tarifa_mano_obra"
                            id="tarifa_mano_obra"
                            value="{{ old('tarifa_mano_obra') }}"
                            min="0"
                            step="0.01"
                            required
                            placeholder="Ej: 15000"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >

                        <p class="text-sm text-gray-500 mt-1">
                            Costo de mano de obra por unidad de magnitud.
                        </p>
                    </div>

                    {{-- Productividad --}}
                    <div class="mb-6">
                        <label for="productividad" class="block font-semibold text-gray-700 mb-2">
                            Productividad
                        </label>

                        <input
                            type="number"
                            name="productividad"
                            id="productividad"
                            value="{{ old('productividad') }}"
                            min="0.0001"
                            step="0.0001"
                            required
                            placeholder="Ej: 20"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >

                        <p class="text-sm text-gray-500 mt-1">
                            Cantidad de unidades de magnitud que se pueden realizar por unidad de tiempo.
                        </p>
                    </div>

                    {{-- Unidad de tiempo --}}
                    <div class="mb-6">
                        <label for="unidad_tiempo" class="block font-semibold text-gray-700 mb-2">
                            Unidad de tiempo
                        </label>

                        <select
                            name="unidad_tiempo"
                            id="unidad_tiempo"
                            required
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >
                            <option value="">Selecciona una opción</option>

                            <option value="DIA" {{ old('unidad_tiempo') == 'DIA' ? 'selected' : '' }}>
                                Días
                            </option>

                            <option value="HORA" {{ old('unidad_tiempo') == 'HORA' ? 'selected' : '' }}>
                                Horas
                            </option>
                        </select>

                        <p class="text-sm text-gray-500 mt-1">
                            Indica si la productividad registrada corresponde a una jornada diaria o a una hora de trabajo.
                        </p>
                    </div>

                    {{-- Estado --}}
                    <div class="mb-8">
                        <label for="activo" class="block font-semibold text-gray-700 mb-2">
                            Estado
                        </label>

                        <select
                            name="activo"
                            id="activo"
                            required
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >
                            <option value="1" {{ old('activo', '1') == '1' ? 'selected' : '' }}>
                                Activo
                            </option>

                            <option value="0" {{ old('activo') === '0' ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>
                    </div>

                    {{-- Materiales --}}
                    <div class="border-t border-gray-200 pt-6 mb-8">

                        <h2 class="text-lg font-bold text-gray-800 mb-2">
                            Materiales necesarios
                        </h2>

                        <p class="text-sm text-gray-600 mb-5">
                            Selecciona los materiales que utilizará este trabajo
                            y define el rendimiento de cada uno.
                        </p>

                        @forelse ($materiales as $material)

                            <div class="border border-gray-200 rounded-lg p-4 mb-4">

                                <div class="flex items-center gap-4">

                                    <input
                                        type="checkbox"
                                        name="materiales[{{ $material->id }}][id]"
                                        value="{{ $material->id }}"
                                        id="material_{{ $material->id }}"
                                        class="rounded border-gray-300"
                                    >

                                    <label
                                        for="material_{{ $material->id }}"
                                        class="font-semibold text-gray-800 flex-1"
                                    >
                                        {{ $material->nombre }}

                                        <span class="text-sm text-gray-500">
                                            ({{ $material->unidad }})
                                        </span>
                                    </label>

                                    <div class="w-48">

                                        <label
                                            for="rendimiento_{{ $material->id }}"
                                            class="block text-sm text-gray-600 mb-1"
                                        >
                                            Rendimiento
                                        </label>

                                        <input
                                            type="number"
                                            name="materiales[{{ $material->id }}][rendimiento]"
                                            id="rendimiento_{{ $material->id }}"
                                            min="0.0001"
                                            step="0.0001"
                                            placeholder="Ej: 8"
                                            class="w-full border-gray-300 rounded-md shadow-sm"
                                        >

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div style="
                                background-color: #fef3c7;
                                color: #92400e;
                                border: 1px solid #fcd34d;
                                padding: 12px 16px;
                                border-radius: 6px;
                            ">
                                No hay materiales activos registrados.
                            </div>

                        @endforelse

                    </div>

                    {{-- Botones --}}
                    <div class="flex items-center gap-3">

                        <button
                            type="submit"
                            style="
                                background-color: #2563eb;
                                color: white;
                                height: 40px;
                                padding: 0 18px;
                                border-radius: 6px;
                                font-weight: 600;
                                border: none;
                                cursor: pointer;
                            "
                        >
                            Guardar tipo de trabajo
                        </button>

                        <a
                            href="{{ route('tipos-trabajo.index') }}"
                            style="
                                background-color: #6b7280;
                                color: white;
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                height: 40px;
                                padding: 0 18px;
                                border-radius: 6px;
                                font-weight: 600;
                                text-decoration: none;
                            "
                        >
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>