@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />

@endsection

@section('navegacion')

    @include('ui.adminnav')
@endsection

@section('content')

    <div class="container mx-auto mb-5">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-5">
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">

                        Nueva Vacante
                    </div>

                                <form class="max-w-lg mx-auto my-10"
                                action="{{ route('vacantes.store') }}"
                                method="POST"
                                >
                                    @csrf

                                    <div class="flex flex-wrap mb-6">

                                            <label for="titulo" class="block text-gray-700 text-sm mb-2">
                                                Titulo de la Vacante
                                            </label>

                                            <input id="titulo"
                                            type="text"
                                            class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror"
                                            name="titulo"
                                            placeholder="Titulo de la vacante"
                                            value="{{ old('titulo') }}">

                                            @error('titulo')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- categoria con su select --}}

                                        <div class="flex flex-wrap mb-6">

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

                                 {{-- experiencia con su select --}}

                                        <div class="flex flex-wrap mb-6">

                                            <label for="experiencia" class="block text-gray-700 text-sm mb-2">
                                                Experiencia
                                            </label>

                                            <select
                                            name="experiencia"
                                            id="experiencia"
                                            class="block appearance-none w-full border border-gray-200
                                                text-gray-700 rounded leading-tight
                                                    focus:outline-none focus:bg-white
                                                focus:border-gray-500 p-3 bg-gray-100 w-full">

                                                <option disabled selected>- Selecciona --</option>
                                                @foreach ($experiencias as $experiencia)

                                                    <option value="{{ $experiencia->id}}"
                                                        {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
                                                    >

                                                        {{ $experiencia->nombre}}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('experiencia')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- ubicacion con su select --}}

                                        <div class="flex flex-wrap mb-6">

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

                                        {{-- salarios con su select --}}

                                        <div class="flex flex-wrap mb-6">

                                            <label for="salario" class="block text-gray-700 text-sm mb-2">
                                                Salario
                                            </label>

                                            <select
                                            name="salario"
                                            id="salario"
                                            class="block appearance-none w-full border border-gray-200
                                                text-gray-700 rounded leading-tight
                                                    focus:outline-none focus:bg-white
                                                focus:border-gray-500 p-3 bg-gray-100 w-full">

                                                <option disabled selected>- Selecciona --</option>
                                                @foreach ($salarios as $salario)

                                                    <option value="{{ $salario->id}}"
                                                        {{ old('salario') == $salario->id ? 'selected' : '' }}
                                                    >

                                                        {{ $salario->nombre}}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('salario')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- descripcion con medium editor --}}
                                        <div class="mb-5">

                                            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                                                Descripción del Puesto
                                            </label>

                                            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

                                            <input type="hidden" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">

                                            @error('descripcion')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- imagen de la vacante --}}
                                        <div class="mb-5">

                                            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                                                 Imagen Vacante
                                            </label>

                                            <div id="dropzoneJobsApp" class="dropzone rounded bg-gray-100"></div>

                                            {{-- el input con el que recibimos la imagen --}}
                                            <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">

                                            @error('imagen')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror

                                            <p id="error"></p>
                                        </div>

                                        <div class="mb-5">

                                            <label for="skills" class="block text-gray-700 text-sm mb-5">
                                                 Habilidades <span class="text-xs">(Elige al menos 2)</span>
                                            </label>

                                            @php
                                                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
                                            @endphp

                                            <list-skills
                                                :skills="{{ json_encode($skills) }}"
                                                :oldskills="{{ json_encode( old('skills') ) }}"

                                            ></list-skills>


                                            @error('skills')
                                                <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb6" role="alert">

                                                    <strong class="font-bold">Error!</strong>
                                                    <span class="block"> {{$message}} </span>
                                                </div>
                                            @enderror
                                        </div>


                                        <button
                                            type="submit"
                                            class="bg-green-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none
                                            focus:shadow-outline uppercase font-bold">

                                                Publicar Vacante
                                        </button>

                                  </div>
                              </div>
                        </form>
                    </div>
              </div>
        </div>
    </div>

@endsection

@section('scripts')

{{-- mediumeditor --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>

{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.js" integrity="sha512-s9Ud0IV97Ilh2e46hhMIez0TyGyBrBcHS+6duvJnmAxyIBwinHEVYKLLWIwmQi3lsQPA7CL+YMtOAFgeVNt6+w==" crossorigin="anonymous"></script>
<script>

    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', () => {

        // mediumeditor
        const editor = new MediumEditor('.editable', {

            toolbar : {

                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                static: true,
                sticky: true
            },
            placeholder: {

                text: 'Información sobre la vacante'
            }
        });

        //Agrega al input hidden lo que el usuario escribe en medium editor
        editor.subscribe('editableInput', function(eventObj, editable) {

            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })

        //Llena el editor con el contenido del input hidden
        editor.setContent( document.querySelector('#descripcion'). value);

        //Dropzone
        const dropzoneJobsApp = new Dropzone('#dropzoneJobsApp', {

            url: "/vacantes/imagen", //url de la imagen
            dictDefaultMessage: 'Sube tu imagen aquí', //para modificar el mensaje del placeholder
            acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",  // PARA QUE SOLO RECIBA ESTOS FORMATOS
            addRemoveLinks: true, //para poder remover la imagen
            dictRemoveFile: 'Borrar archivo',
            maxFiles: 1, //cantidad que se puede subir
            headers: {
                //el token para que pueda subir la imagen
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function(){
                if(document.querySelector('#imagen').value.trim()){

                    //creamos el objeto
                    let imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this.imagenPublicada);
                    this.options.thumbnail.call(this.imagenPublicada, `/storage/vacantes/${imagenPublicada,name} `);

                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complete');


                }

            },
            success: function(file, response){

                // console.log(response);
                //  console.log(response.correcto);
                document.querySelector('#error').textContent = '';

                //Se coloca la respuesta del servidor en el input hidden de imagen vacante
                document.querySelector('#imagen').value = response.correcto;

                //añadimos al objeto de archivo el nombre que se subio al servidor
                file.nombreServidor = response.correcto;
            },

            maxfilesexceeded: function(file){
                if( this.files[1] != null) {

                    this.removeFile(this.files[0]); //elimina el archivo anterior
                    this.addFile(file); //agrega la nueva imagen
                }
            },
            removeFile: function(file,response){

                file.previewElement.parentNode.removeChild(file.previewElement);

                params = {

                    imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                }

                axios.post('/vacantes/borrarimagen', params )
                     .then(respuesta => console.log(respuesta))
            }
        });

    })
</script>

@endsection
