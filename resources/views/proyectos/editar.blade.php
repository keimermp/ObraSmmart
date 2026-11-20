<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar proyecto
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Modifica los datos de tu proyecto.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-gray-800">
                    Editar proyecto
                </h1>

                <p class="text-gray-600 mt-1 mb-6">
                    Actualiza la información del proyecto
                    <strong>{{ $proyecto->nombre }}</strong>.
                </p>


                {{-- Errores de validación --}}
                @if ($errors->any())

                    <div class="bg-red-100 border border-red-300
                                text-red-700 px-4 py-3 rounded-md mb-6">

                        <strong>
                            Se encontraron los siguientes errores:
                        </strong>

                        <ul class="list-disc ml-5 mt-2">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('proyectos.actualizar', $proyecto->id) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    {{-- Nombre --}}
                    <div class="mb-5">

                        <label
                            for="nombre"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Nombre del proyecto
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $proyecto->nombre) }}"
                            required
                            class="w-full border-gray-300 rounded-md
                                   shadow-sm focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                    </div>


                    {{-- Descripción --}}
                    <div class="mb-5">

                        <label
                            for="descripcion"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Descripción
                        </label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            class="w-full border-gray-300 rounded-md
                                   shadow-sm focus:border-blue-500
                                   focus:ring-blue-500"
                        >{{ old('descripcion', $proyecto->descripcion) }}</textarea>

                    </div>


                    {{-- Tipo de trabajo --}}
                    <div class="mb-5">

                        <label
                            for="tipo_trabajo_id"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Tipo de trabajo
                        </label>

                        <select
                            id="tipo_trabajo_id"
                            name="tipo_trabajo_id"
                            required
                            class="w-full border-gray-300 rounded-md
                                   shadow-sm focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                            <option value="">
                                Seleccione un tipo de trabajo
                            </option>

                            @foreach ($tiposTrabajo as $tipo)

                                <option
                                    value="{{ $tipo->id }}"
                                    {{ old('tipo_trabajo_id', $proyecto->tipo_trabajo_id) == $tipo->id ? 'selected' : '' }}
                                >
                                    {{ $tipo->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Unidad --}}
                    <div class="mb-5">

                        <label
                            for="unidad_medida"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Unidad de medida
                        </label>

                        <select
                            id="unidad_medida"
                            name="unidad_medida"
                            required
                            class="w-full border-gray-300 rounded-md
                                   shadow-sm focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                            <option
                                value="m"
                                {{ old('unidad_medida', $proyecto->unidad_medida) == 'm' ? 'selected' : '' }}
                            >
                                Metros (m)
                            </option>

                            <option
                                value="cm"
                                {{ old('unidad_medida', $proyecto->unidad_medida) == 'cm' ? 'selected' : '' }}
                            >
                                Centímetros (cm)
                            </option>

                        </select>

                    </div>


                    {{-- Dimensiones --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

                        <div>

                            <label
                                for="largo"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Largo
                            </label>

                            <input
                                type="number"
                                id="largo"
                                name="largo"
                                value="{{ old('largo', $proyecto->largo) }}"
                                step="0.01"
                                min="0"
                                class="w-full border-gray-300 rounded-md
                                       shadow-sm focus:border-blue-500
                                       focus:ring-blue-500"
                            >

                        </div>


                        <div>

                            <label
                                for="ancho"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Ancho
                            </label>

                            <input
                                type="number"
                                id="ancho"
                                name="ancho"
                                value="{{ old('ancho', $proyecto->ancho) }}"
                                step="0.01"
                                min="0"
                                class="w-full border-gray-300 rounded-md
                                       shadow-sm focus:border-blue-500
                                       focus:ring-blue-500"
                            >

                        </div>


                        <div>

                            <label
                                for="alto"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Alto
                            </label>

                            <input
                                type="number"
                                id="alto"
                                name="alto"
                                value="{{ old('alto', $proyecto->alto) }}"
                                step="0.01"
                                min="0"
                                class="w-full border-gray-300 rounded-md
                                       shadow-sm focus:border-blue-500
                                       focus:ring-blue-500"
                            >

                        </div>

                    </div>


                    {{-- Botones --}}
                    <div class="flex items-center justify-between">

                        <a
                            href="{{ route('proyectos.index') }}"
                            class="px-5 py-2 border border-gray-300
                                   text-gray-700 rounded-md
                                   hover:bg-gray-100"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2 bg-blue-600 text-white
                                   rounded-md hover:bg-blue-700
                                   font-semibold"
                        >
                            Guardar cambios
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>