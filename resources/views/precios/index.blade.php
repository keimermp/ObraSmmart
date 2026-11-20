<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Precios de materiales
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Administración e historial de precios de los materiales.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Encabezado --}}
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Precios
                    </h1>

                    <p class="text-gray-600 mt-1">
                        Consulta los precios registrados de los materiales.
                    </p>
                </div>

                <a
                    href="{{ route('precios.crear') }}"
                    style="
                        background-color: #2563eb;
                        color: white;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        height: 40px;
                        padding: 0 16px;
                        border-radius: 6px;
                        font-weight: 600;
                        text-decoration: none;
                    "
                >
                    + Nuevo precio
                </a>

            </div>


            {{-- Mensaje de éxito --}}
            @if (session('success'))

                <div
                    style="
                        background-color: #dcfce7;
                        color: #166534;
                        border: 1px solid #86efac;
                        padding: 12px 16px;
                        border-radius: 6px;
                        margin-bottom: 20px;
                    "
                >
                    {{ session('success') }}
                </div>

            @endif


            {{-- Tabla --}}
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Material
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Precio
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Fecha inicio
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Fecha fin
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Estado
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            @forelse ($precios as $precio)

                                <tr>

                                    {{-- Material --}}
                                    <td class="px-6 py-4">

                                        <span class="font-semibold text-gray-800">
                                            {{ $precio->material->nombre }}
                                        </span>

                                    </td>


                                    {{-- Precio --}}
                                    <td class="px-6 py-4 text-gray-700">

                                        ${{ number_format($precio->precio, 2, ',', '.') }}

                                        <span class="text-sm text-gray-500">
                                            / {{ $precio->material->unidad }}
                                        </span>

                                    </td>


                                    {{-- Fecha inicio --}}
                                    <td class="px-6 py-4 text-gray-600">

                                        {{ $precio->fecha_inicio->format('d/m/Y') }}

                                    </td>


                                    {{-- Fecha fin --}}
                                    <td class="px-6 py-4 text-gray-600">

                                        @if ($precio->fecha_fin)

                                            {{ $precio->fecha_fin->format('d/m/Y') }}

                                        @else

                                            <span class="text-gray-400">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Estado --}}
                                    <td class="px-6 py-4">

                                        @if ($precio->actual)

                                            <span
                                                class="px-3 py-1 text-xs font-semibold
                                                       bg-green-100 text-green-700
                                                       rounded-full"
                                            >
                                                Actual
                                            </span>

                                        @else

                                            <span
                                                class="px-3 py-1 text-xs font-semibold
                                                       bg-gray-100 text-gray-600
                                                       rounded-full"
                                            >
                                                Histórico
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Acciones --}}
                                    <td class="px-6 py-4">

                                        <a
                                            href="{{ route('precios.editar', $precio->id) }}"
                                            style="
                                                background-color: #eab308;
                                                color: white;
                                                display: inline-flex;
                                                align-items: center;
                                                justify-content: center;
                                                height: 36px;
                                                padding: 0 14px;
                                                border-radius: 6px;
                                                font-weight: 600;
                                                text-decoration: none;
                                            "
                                        >
                                            Editar
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="px-6 py-10 text-center text-gray-500"
                                    >
                                        No hay precios registrados.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>