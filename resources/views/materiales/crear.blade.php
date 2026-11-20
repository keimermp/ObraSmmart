<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo material
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Registra un nuevo material de construcción.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-gray-800">
                    Registrar material
                </h1>

                <p class="text-gray-600 mt-1 mb-6">
                    Completa la información del material.
                </p>


                {{-- Errores de validación --}}
                @if ($errors->any())

                    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-md p-4">

                        <p class="font-semibold mb-2">
                            Hay algunos errores:
                        </p>

                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('materiales.guardar') }}"
                    method="POST"
                >

                    @csrf


                    {{-- Nombre --}}
                    <div class="mb-5">

                        <label
                            for="nombre"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Nombre del material
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Ejemplo: Cemento"
                            required
                            maxlength="150"
                            class="w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-blue-500 focus:ring-blue-500"
                        >

                    </div>


                    {{-- Unidad --}}
                    <div class="mb-5">

                        <label
                            for="unidad"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Unidad
                        </label>

                        <input
                            type="text"
                            id="unidad"
                            name="unidad"
                            value="{{ old('unidad') }}"
                            placeholder="Ejemplo: bulto, kg, litro, m²"
                            required
                            maxlength="30"
                            class="w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-blue-500 focus:ring-blue-500"
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
                            placeholder="Descripción del material..."
                            class="w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('descripcion') }}</textarea>

                    </div>


                    {{-- Estado --}}
                    <div class="mb-6">

                        <label
                            for="activo"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Estado
                        </label>

                        <select
                            id="activo"
                            name="activo"
                            class="w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-blue-500 focus:ring-blue-500"
                        >

                            <option value="1"
                                {{ old('activo', '1') == '1' ? 'selected' : '' }}>
                                Activo
                            </option>

                            <option value="0"
                                {{ old('activo') === '0' ? 'selected' : '' }}>
                                Inactivo
                            </option>

                        </select>

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
                                border: none;
                                border-radius: 6px;
                                font-weight: 600;
                                cursor: pointer;
                            "
                        >
                            Guardar material
                        </button>

                        <a
                            href="{{ route('materiales.index') }}"
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