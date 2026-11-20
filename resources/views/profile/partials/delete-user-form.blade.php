<section>

    <form
        method="post"
        action="{{ route('profile.destroy') }}"
        onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');"
    >

        @csrf

        @method('delete')


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
                Contraseña
            </label>

            <input
                id="password"
                name="password"
                type="password"
                placeholder="Ingresa tu contraseña"
                style="
                    width:100%;
                    padding:11px 13px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                    font-size:14px;
                "
            >

            @if($errors->userDeletion->get('password'))

                <div style="
                    color:#dc2626;
                    font-size:12px;
                    margin-top:6px;
                ">
                    {{ $errors->userDeletion->first('password') }}
                </div>

            @endif

        </div>


        <button
            type="submit"
            style="
                background:#dc2626;
                color:white;
                border:none;
                padding:10px 17px;
                border-radius:7px;
                font-size:13px;
                font-weight:600;
                cursor:pointer;
            "
        >
            Eliminar mi cuenta
        </button>

    </form>

</section>