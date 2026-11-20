<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar precio
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    Nuevo precio
                </h1>

                <p class="text-gray-600 mb-6">
                    Registra el precio actual de un material.
                </p>


                {{-- Errores --}}
                @if ($errors->any())

                    <div
                        style="
                            background-color: #fee2e2;
                            color: #991b1b;
                            border: 1px solid #fca5a5;
                            padding: 12px 16px;
                            border-radius: 6px;
                            margin-bottom: 20px;
                        "
                    >
                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>
                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('precios.guardar') }}"
                >

                    @csrf


                    {{-- Material --}}
                    <div class="mb-6">

                        <label
                            for="material_id"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            Material
                        </label>

                        <select
                            name="material_id"
                            id="material_id"
                            required
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >

                            <option value="">
                                Selecciona un material
                            </option>

                            @foreach ($materiales as $material)

                                <option
                                    value="{{ $material->id }}"
                                    {{ old('material_id') == $material->id ? 'selected' : '' }}
                                >
                                    {{ $material->nombre }}
                                    ({{ $material->unidad }})
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Precio --}}
                    <div class="mb-6">

                        <label
                            for="precio"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            Precio
                        </label>

                        <input
                            type="number"
                            name="precio"
                            id="precio"
                            value="{{ old('precio') }}"
                            min="0"
                            step="0.01"
                            required
                            placeholder="Ej: 35000"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >

                    </div>


                    {{-- Fecha --}}
                    <div class="mb-6">

                        <label
                            for="fecha_inicio"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            Fecha de inicio
                        </label>

                        <input
                            type="date"
                            name="fecha_inicio"
                            id="fecha_inicio"
                            value="{{ old('fecha_inicio', date('Y-m-d')) }}"
                            required
                            class="w-full border-gray-300 rounded-md shadow-sm"
                        >

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
                            Guardar precio
                        </button>

                        <a
                            href="{{ route('precios.index') }}"
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