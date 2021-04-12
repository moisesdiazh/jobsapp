<h2 class="my-10 text-2xl text-gray-700">
    Busca una vacante
</h2>

<form
    method="POST"
    action="{{ route('vacantes.buscar')}}">

    @csrf
{{-- viene del create, debemos modificar el iniciocontroller para que pueda agarrar el bucle de ubicaciones --}}
    <div class="mb-5">

        <label for="categoria" class="block text-gray-700 text-sm mb-2">
            Categoria
        </label>

        <select
        name="categoria"
        id="categoria"
        class="block appearance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white
            focus:border-gray-500 p-3 bg-gray-100 w-full">

            <option disabled selected>- Selecciona --</option>
            @foreach ($categorias as $categoria)

                <option value="{{ $categoria->id}}"
                        {{ old('categoria') == $categoria->id ? 'selected' : ''}}
                >

                    {{ $categoria->nombre}}
                </option>
            @endforeach
        </select>

        @error('categoria')
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}} </span>
            </div>
        @enderror

    </div>

    <div class="mb-5">

        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">
            Ubicación
        </label>

        <select
        name="ubicacion"
        id="ubicacion"
        class="block appearance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white
            focus:border-gray-500 p-3 bg-gray-100 w-full">

            <option disabled selected>- Selecciona --</option>
            @foreach ($ubicaciones as $ubicacion)

                <option value="{{ $ubicacion->id}}"
                    {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                >

                    {{ $ubicacion->nombre}}
                </option>
            @endforeach
        </select>

        @error('ubicacion')
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}} </span>
            </div>
        @enderror

    </div>

    <button
        class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10"
        type="submit">

        Buscar Vacantes
    </button>
</form>
