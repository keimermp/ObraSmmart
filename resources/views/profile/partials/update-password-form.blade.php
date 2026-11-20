<section>

    <form method="post" action="{{ route('password.update') }}">

        @csrf

        @method('put')


        {{-- CONTRASEÑA ACTUAL --}}

        <div style="margin-bottom:18px;">

            <label
                for="current_password"
                style="
                    display:block;
                    margin-bottom:7px;
                    font-size:13px;
                    font-weight:600;
                    color:#374151;
                "
            >
                Contraseña actual
            </label>

            <input
                id="current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                style="
                    width:100%;
                    padding:11px 13px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                    font-size:14px;
                "
            >

            @if($errors->updatePassword->get('current_password'))

                <div style="
                    color:#dc2626;
                    font-size:12px;
                    margin-top:6px;
                ">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>

            @endif

        </div>


        {{-- NUEVA CONTRASEÑA --}}

        <div style="margin-bottom:18px;">

            <label
                for="password"
                style="
                    display:block;
                    margin-bottom:7px;
                    font-size:13px;
                    font-weight:600;
                    color:#374151;
                "
            >
                Nueva contraseña
            </label>

            <input
                id="password"
                name="password"
                type="password"
                autocomplete="new-password"
                style="
                    width:100%;
                    padding:11px 13px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                    font-size:14px;
                "
            >

            @if($errors->updatePassword->get('password'))

                <div style="
                    color:#dc2626;
                    font-size:12px;
                    margin-top:6px;
                ">
                    {{ $errors->updatePassword->first('password') }}
                </div>

            @endif

        </div>


        {{-- CONFIRMAR --}}

        <div style="margin-bottom:20px;">

            <label
                for="password_confirmation"
                style="
                    display:block;
                    margin-bottom:7px;
                    font-size:13px;
                    font-weight:600;
                    color:#374151;
                "
            >
                Confirmar nueva contraseña
            </label>

            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                style="
                    width:100%;
                    padding:11px 13px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                    font-size:14px;
                "
            >

        </div>


        <button
            type="submit"
            style="
                background:#2563eb;
                color:white;
                border:none;
                padding:10px 17px;
                border-radius:7px;
                font-size:13px;
                font-weight:600;
                cursor:pointer;
            "
        >
            Actualizar contraseña
        </button>


        @if(session('status') === 'password-updated')

            <span style="
                margin-left:12px;
                color:#16a34a;
                font-size:13px;
            ">
                ✓ Contraseña actualizada correctamente.
            </span>

        @endif

    </form>

</section>