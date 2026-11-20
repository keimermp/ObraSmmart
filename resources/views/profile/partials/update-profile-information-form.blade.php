<form method="post" action="{{ route('profile.update') }}">

    @csrf

    @method('patch')


    {{-- NOMBRE --}}

    <div style="margin-bottom:20px;">

        <label
            for="name"
            style="
                display:block;
                margin-bottom:7px;
                font-size:13px;
                font-weight:600;
                color:#374151;
            "
        >
            Nombre
        </label>

        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $user->name) }}"
            required
            autofocus
            autocomplete="name"
            style="
                width:100%;
                padding:11px 13px;
                border:1px solid #d1d5db;
                border-radius:8px;
                outline:none;
                font-size:14px;
            "
        >

        @if($errors->get('name'))

            <div style="
                color:#dc2626;
                font-size:12px;
                margin-top:6px;
            ">
                {{ $errors->first('name') }}
            </div>

        @endif

    </div>


    {{-- CORREO --}}

    <div style="margin-bottom:20px;">

        <label
            for="email"
            style="
                display:block;
                margin-bottom:7px;
                font-size:13px;
                font-weight:600;
                color:#374151;
            "
        >
            Correo electrónico
        </label>

        <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email', $user->email) }}"
            required
            autocomplete="username"
            style="
                width:100%;
                padding:11px 13px;
                border:1px solid #d1d5db;
                border-radius:8px;
                outline:none;
                font-size:14px;
            "
        >

        @if($errors->get('email'))

            <div style="
                color:#dc2626;
                font-size:12px;
                margin-top:6px;
            ">
                {{ $errors->first('email') }}
            </div>

        @endif

    </div>


    <div style="
        display:flex;
        align-items:center;
        gap:15px;
    ">

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
            Guardar cambios
        </button>


        @if(session('status') === 'profile-updated')

            <span style="
                color:#16a34a;
                font-size:13px;
            ">
                ✓ Información actualizada correctamente.
            </span>

        @endif

    </div>

</form>