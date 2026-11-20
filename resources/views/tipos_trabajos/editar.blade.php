<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar tipo de trabajo
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Modifica la información, materiales y rendimientos.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm p-6">

                <h1 class="text-2xl font-bold text-gray-800 mb-6">
                    Editar tipo de trabajo
                </h1>

                {{-- ERRORES --}}
                @if ($errors->any())
                    <div
                        class="mb-6 p-4 rounded-lg"
                        style="
                            background-color: #fee2e2;
                            color: #991b1b;
                            border: 1px solid #fca5a5;
                        "
                    >
                        <strong>Hay errores:</strong>

                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- FORMULARIO --}}
                <form
                    action="{{ route('tipos-trabajo.actualizar', $tipoTrabajo->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    {{-- NOMBRE --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            value="{{ old('nombre', $tipoTrabajo->nombre) }}"
                            required
                            maxlength="150"
                            class="w-full rounded-lg border-gray-300"
                        >
                    </div>

                    {{-- DESCRIPCIÓN --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Descripción
                        </label>

                        <textarea
                            name="descripcion"
                            rows="4"
                            class="w-full rounded-lg border-gray-300"
                        >{{ old('descripcion', $tipoTrabajo->descripcion) }}</textarea>
                    </div>

                    {{-- TIPO DE MAGNITUD --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Tipo de magnitud
                        </label>

                        <select
                            name="tipo_magnitud"
                            required
                            class="w-full rounded-lg border-gray-300"
                        >
                            <option
                                value="AREA_RECTANGULAR"
                                {{ old('tipo_magnitud', $tipoTrabajo->tipo_magnitud) == 'AREA_RECTANGULAR' ? 'selected' : '' }}
                            >
                                Área rectangular
                            </option>

                            <option
                                value="AREA_VERTICAL"
                                {{ old('tipo_magnitud', $tipoTrabajo->tipo_magnitud) == 'AREA_VERTICAL' ? 'selected' : '' }}
                            >
                                Área vertical
                            </option>

                            <option
                                value="VOLUMEN"
                                {{ old('tipo_magnitud', $tipoTrabajo->tipo_magnitud) == 'VOLUMEN' ? 'selected' : '' }}
                            >
                                Volumen
                            </option>

                            <option
                                value="LINEAL"
                                {{ old('tipo_magnitud', $tipoTrabajo->tipo_magnitud) == 'LINEAL' ? 'selected' : '' }}
                            >
                                Lineal
                            </option>
                        </select>
                    </div>

                    {{-- UNIDAD --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Unidad de magnitud
                        </label>

                        <input
                            type="text"
                            name="unidad_magnitud"
                            value="{{ old('unidad_magnitud', $tipoTrabajo->unidad_magnitud) }}"
                            required
                            maxlength="10"
                            class="w-full rounded-lg border-gray-300"
                        >
                    </div>

                    {{-- TARIFA --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Tarifa de mano de obra
                        </label>

                        <input
                            type="number"
                            name="tarifa_mano_obra"
                            value="{{ old('tarifa_mano_obra', $tipoTrabajo->tarifa_mano_obra) }}"
                            required
                            min="0"
                            step="0.01"
                            class="w-full rounded-lg border-gray-300"
                        >

                        <p class="text-sm text-gray-500 mt-1">
                            Costo de mano de obra por unidad de magnitud.
                        </p>
                    </div>

                    {{-- PRODUCTIVIDAD --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Productividad
                        </label>

                        <input
                            type="number"
                            name="productividad"
                            value="{{ old('productividad', $tipoTrabajo->productividad) }}"
                            required
                            min="0.0001"
                            step="0.0001"
                            class="w-full rounded-lg border-gray-300"
                        >

                        <p class="text-sm text-gray-500 mt-1">
                            Cantidad de unidades de magnitud que se pueden realizar por unidad de tiempo.
                        </p>
                    </div>

                    {{-- UNIDAD DE TIEMPO --}}
                    <div class="mb-5">
                        <label
                            for="unidad_tiempo"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            Unidad de tiempo
                        </label>

                        <select
                            name="unidad_tiempo"
                            id="unidad_tiempo"
                            required
                            class="w-full rounded-lg border-gray-300"
                        >
                            <option value="">
                                Selecciona una unidad de tiempo
                            </option>

                            <option
                                value="DIA"
                                {{ old('unidad_tiempo', $tipoTrabajo->unidad_tiempo) == 'DIA' ? 'selected' : '' }}
                            >
                                Días
                            </option>

                            <option
                                value="HORA"
                                {{ old('unidad_tiempo', $tipoTrabajo->unidad_tiempo) == 'HORA' ? 'selected' : '' }}
                            >
                                Horas
                            </option>
                        </select>

                        <p class="text-sm text-gray-500 mt-1">
                            Indica si la productividad registrada corresponde a días u horas.
                        </p>
                    </div>

                    {{-- ESTADO --}}
                    <div class="mb-8">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Estado
                        </label>

                        <select
                            name="activo"
                            required
                            class="w-full rounded-lg border-gray-300"
                        >
                            <option
                                value="1"
                                {{ old('activo', $tipoTrabajo->activo ? '1' : '0') == '1' ? 'selected' : '' }}
                            >
                                Activo
                            </option>

                            <option
                                value="0"
                                {{ old('activo', $tipoTrabajo->activo ? '1' : '0') == '0' ? 'selected' : '' }}
                            >
                                Inactivo
                            </option>
                        </select>
                    </div>

                    {{-- MATERIALES --}}
                    <div class="mb-8">

                        <h2 class="text-xl font-bold text-gray-800 mb-2">
                            Materiales
                        </h2>

                        <p class="text-gray-500 mb-5">
                            Selecciona los materiales utilizados y especifica
                            su rendimiento.
                        </p>

                        @foreach ($materiales as $material)

                            @php
                                $materialAsignado =
                                    $tipoTrabajo->materiales
                                        ->firstWhere('id', $material->id);
                            @endphp

                            <div
                                class="border rounded-lg p-4 mb-4"
                                style="border-color: #e5e7eb;"
                            >
                                <div class="flex flex-col md:flex-row md:items-center gap-4">

                                    {{-- MATERIAL --}}
                                    <div class="flex items-center gap-3 flex-1">

                                        <input
                                            type="checkbox"
                                            id="material_{{ $material->id }}"
                                            name="materiales[{{ $material->id }}][id]"
                                            value="{{ $material->id }}"
                                            {{ $materialAsignado ? 'checked' : '' }}
                                            class="rounded border-gray-300"
                                        >

                                        <label
                                            for="material_{{ $material->id }}"
                                            class="font-semibold text-gray-800 cursor-pointer"
                                        >
                                            {{ $material->nombre }}
                                        </label>

                                        <span class="text-sm text-gray-500">
                                            ({{ $material->unidad }})
                                        </span>

                                    </div>

                                    {{-- RENDIMIENTO --}}
                                    <div class="w-full md:w-56">

                                        <label
                                            for="rendimiento_{{ $material->id }}"
                                            class="block text-sm font-semibold text-gray-600 mb-1"
                                        >
                                            Rendimiento
                                        </label>

                                        <input
                                            type="number"
                                            id="rendimiento_{{ $material->id }}"
                                            name="materiales[{{ $material->id }}][rendimiento]"
                                            value="{{ $materialAsignado ? $materialAsignado->pivot->rendimiento : '' }}"
                                            min="0.0001"
                                            step="0.0001"
                                            placeholder="Ej: 8"
                                            class="w-full rounded-lg border-gray-300"
                                        >

                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                    {{-- BOTONES --}}
                    <div
                        class="flex flex-col sm:flex-row justify-end gap-3 pt-5"
                        style="border-top: 1px solid #e5e7eb;"
                    >

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
                                border-radius: 7px;
                                font-weight: 600;
                                text-decoration: none;
                            "
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            style="
                                background-color: #2563eb;
                                color: white;
                                height: 40px;
                                padding: 0 18px;
                                border-radius: 7px;
                                font-weight: 600;
                                border: none;
                                cursor: pointer;
                            "
                        >
                            Guardar cambios
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>