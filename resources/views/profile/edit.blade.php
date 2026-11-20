<x-app-layout>

    <x-slot name="header">

        <h2>
            Mi perfil
        </h2>

        <p>
            Administra la información y seguridad de tu cuenta.
        </p>

    </x-slot>


    <div class="os-container">

        {{-- INFORMACIÓN PERSONAL --}}

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:25px;
            margin-bottom:20px;
        ">

            <h3 style="
                margin:0;
                font-size:18px;
            ">
                Información personal
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
                margin-bottom:22px;
            ">
                Actualiza tu nombre y correo electrónico.
            </p>

            @include(
                'profile.partials.update-profile-information-form'
            )

        </div>


        {{-- CONTRASEÑA --}}

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:25px;
            margin-bottom:20px;
        ">

            <h3 style="
                margin:0;
                font-size:18px;
            ">
                Seguridad de la cuenta
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
                margin-bottom:22px;
            ">
                Cambia tu contraseña para mantener segura tu cuenta.
            </p>

            @include(
                'profile.partials.update-password-form'
            )

        </div>


        {{-- ELIMINAR CUENTA --}}

        <div style="
            background:white;
            border:1px solid #fecaca;
            border-radius:12px;
            padding:25px;
        ">

            <h3 style="
                margin:0;
                font-size:18px;
                color:#991b1b;
            ">
                Eliminar cuenta
            </h3>

            <p style="
                color:#64748b;
                font-size:13px;
                margin-top:6px;
                margin-bottom:22px;
            ">
                La eliminación de la cuenta es permanente.
            </p>

            @include(
                'profile.partials.delete-user-form'
            )

        </div>

    </div>

</x-app-layout>