<x-app-layout>

    <div style="
        min-height: 100vh;
        background: #f5f7fb;
        padding: 35px;
    ">

        <div style="
            max-width: 900px;
            margin: 0 auto;
        ">

            <!-- ENCABEZADO -->

            <div style="
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 14px;
                padding: 25px;
                margin-bottom: 22px;
            ">

                <h1 style="
                    margin: 0;
                    font-size: 24px;
                    font-weight: 800;
                    color: #111827;
                ">
                    Nuevo proyecto
                </h1>

                <p style="
                    margin: 8px 0 0;
                    color: #6b7280;
                    font-size: 14px;
                ">
                    Registra los datos de tu proyecto para generar
                    una estimación de materiales, mano de obra,
                    tiempo y costos.
                </p>

            </div>


            <!-- ERRORES DE VALIDACIÓN -->

            @if ($errors->any())

                <div style="
                    background: #fef2f2;
                    border: 1px solid #fecaca;
                    color: #991b1b;
                    border-radius: 10px;
                    padding: 15px;
                    margin-bottom: 20px;
                ">

                    <strong>
                        Revisa los siguientes errores:
                    </strong>

                    <ul style="
                        margin: 10px 0 0 20px;
                    ">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORMULARIO -->

            <form
                method="POST"
                action="{{ route('proyectos.guardar') }}"
            >

                @csrf


                <div style="
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 14px;
                    padding: 25px;
                ">


                    <!-- =========================
                         INFORMACIÓN DEL PROYECTO
                    ========================== -->

                    <h2 style="
                        margin: 0 0 20px;
                        font-size: 18px;
                        font-weight: 700;
                        color: #111827;
                    ">
                        Información del proyecto
                    </h2>


                    <!-- NOMBRE -->

                    <div style="
                        margin-bottom: 18px;
                    ">

                        <label
                            for="nombre"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                font-size: 13px;
                                font-weight: 600;
                                color: #374151;
                            "
                        >
                            Nombre del proyecto
                        </label>


                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            required
                            maxlength="150"
                            placeholder="Ej. Pintura de sala"
                            style="
                                width: 100%;
                                padding: 11px 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 8px;
                                outline: none;
                                font-size: 14px;
                            "
                        >

                    </div>


                    <!-- DESCRIPCIÓN -->

                    <div style="
                        margin-bottom: 22px;
                    ">

                        <label
                            for="descripcion"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                font-size: 13px;
                                font-weight: 600;
                                color: #374151;
                            "
                        >
                            Descripción
                        </label>


                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            placeholder="Describe brevemente el proyecto..."
                            style="
                                width: 100%;
                                padding: 11px 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 8px;
                                outline: none;
                                font-size: 14px;
                                resize: vertical;
                            "
                        >{{ old('descripcion') }}</textarea>

                    </div>


                    <!-- =========================
                         TIPO DE TRABAJO
                    ========================== -->

                    <h2 style="
                        margin: 0 0 20px;
                        font-size: 18px;
                        font-weight: 700;
                        color: #111827;
                    ">
                        Tipo de trabajo
                    </h2>


                    <div style="
                        margin-bottom: 22px;
                    ">

                        <label
                            for="tipo_trabajo_id"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                font-size: 13px;
                                font-weight: 600;
                                color: #374151;
                            "
                        >
                            Selecciona el tipo de trabajo
                        </label>


                        <select
                            id="tipo_trabajo_id"
                            name="tipo_trabajo_id"
                            required
                            style="
                                width: 100%;
                                padding: 11px 12px;
                                border: 1px solid #d1d5db;
                                border-radius: 8px;
                                background: white;
                                font-size: 14px;
                            "
                        >

                            <option value="">
                                Selecciona un tipo de trabajo
                            </option>


                            @foreach ($tiposTrabajo as $tipo)

                                <option
                                    value="{{ $tipo->id }}"
                                    {{ old('tipo_trabajo_id') == $tipo->id ? 'selected' : '' }}
                                >

                                    {{ $tipo->nombre }}

                                    — {{ $tipo->unidad_magnitud }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- =========================
                         DIMENSIONES
                    ========================== -->

                    <h2 style="
                        margin: 0 0 8px;
                        font-size: 18px;
                        font-weight: 700;
                        color: #111827;
                    ">
                        Dimensiones
                    </h2>


                    <p style="
                        margin: 0 0 20px;
                        color: #6b7280;
                        font-size: 13px;
                    ">
                        Ingresa las dimensiones correspondientes al
                        tipo de trabajo seleccionado.
                    </p>


                    <div style="
                        display: grid;
                        grid-template-columns:
                            repeat(auto-fit, minmax(200px, 1fr));
                        gap: 16px;
                        margin-bottom: 20px;
                    ">


                        <!-- LARGO -->

                        <div>

                            <label
                                for="largo"
                                style="
                                    display: block;
                                    margin-bottom: 7px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    color: #374151;
                                "
                            >
                                Largo
                            </label>


                            <input
                                type="number"
                                id="largo"
                                name="largo"
                                value="{{ old('largo') }}"
                                min="0"
                                step="0.0001"
                                placeholder="Ej. 5"
                                style="
                                    width: 100%;
                                    padding: 11px 12px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                "
                            >

                        </div>


                        <!-- ANCHO -->

                        <div>

                            <label
                                for="ancho"
                                style="
                                    display: block;
                                    margin-bottom: 7px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    color: #374151;
                                "
                            >
                                Ancho
                            </label>


                            <input
                                type="number"
                                id="ancho"
                                name="ancho"
                                value="{{ old('ancho') }}"
                                min="0"
                                step="0.0001"
                                placeholder="Ej. 4"
                                style="
                                    width: 100%;
                                    padding: 11px 12px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                "
                            >

                        </div>


                        <!-- ALTO -->

                        <div>

                            <label
                                for="alto"
                                style="
                                    display: block;
                                    margin-bottom: 7px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    color: #374151;
                                "
                            >
                                Alto
                            </label>


                            <input
                                type="number"
                                id="alto"
                                name="alto"
                                value="{{ old('alto') }}"
                                min="0"
                                step="0.0001"
                                placeholder="Ej. 2.5"
                                style="
                                    width: 100%;
                                    padding: 11px 12px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                "
                            >

                        </div>


                        <!-- UNIDAD -->

                        <div>

                            <label
                                for="unidad_medida"
                                style="
                                    display: block;
                                    margin-bottom: 7px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    color: #374151;
                                "
                            >
                                Unidad de medida
                            </label>


                            <select
                                id="unidad_medida"
                                name="unidad_medida"
                                required
                                style="
                                    width: 100%;
                                    padding: 11px 12px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    background: white;
                                    font-size: 14px;
                                "
                            >

                                <option
                                    value="m"
                                    {{ old('unidad_medida', 'm') == 'm' ? 'selected' : '' }}
                                >
                                    Metros (m)
                                </option>

                                <option
                                    value="cm"
                                    {{ old('unidad_medida') == 'cm' ? 'selected' : '' }}
                                >
                                    Centímetros (cm)
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- AVISO -->

                    <div style="
                        background: #eff6ff;
                        border: 1px solid #bfdbfe;
                        border-radius: 9px;
                        padding: 13px 15px;
                        color: #1e40af;
                        font-size: 13px;
                        line-height: 1.5;
                        margin-bottom: 25px;
                    ">

                        💡 <strong>Importante:</strong>
                        ObraSmart utilizará las dimensiones ingresadas
                        para calcular la magnitud, materiales,
                        mano de obra, tiempo y costo estimado.

                    </div>


                    <!-- =========================
                         BOTONES
                    ========================== -->

                    <div style="
                        display: flex;
                        justify-content: flex-end;
                        gap: 10px;
                        padding-top: 5px;
                    ">


                        <!-- CANCELAR -->

                        <a
                            href="{{ route('proyectos.index') }}"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                padding: 11px 20px;
                                background: #e5e7eb;
                                color: #374151;
                                text-decoration: none;
                                border-radius: 8px;
                                font-size: 14px;
                                font-weight: 600;
                                border: 1px solid #d1d5db;
                            "
                        >

                            Cancelar

                        </a>


                        <!-- CREAR -->

                        <button
                            type="submit"
                            style="
                                padding: 11px 20px;
                                background: #2563eb;
                                color: white;
                                border: none;
                                border-radius: 8px;
                                font-size: 14px;
                                font-weight: 600;
                                cursor: pointer;
                            "
                        >

                            Crear proyecto

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>