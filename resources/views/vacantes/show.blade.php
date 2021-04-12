@extends('layouts.app')

{{-- ESTE SECTION PERTENECE AL LIGHTBOX2 PARA LAS IMAGENES, LA HOJA DE ESTILOS --}}
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10"> {{ $vacante->titulo }} </h1>
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">

            <p  class="block text-gray-700 font-bold my-2">
                Publicado <span class="font-normal"> {{ $vacante->created_at->diffForHumans()}} </span>
                por <span class="font-normal"> {{ $vacante->reclutador->name}} </span>
            </p>

            <p  class="block text-gray-700 font-bold my-2">
                Categoria: <span class="font-normal"> {{ $vacante->categoria->nombre}} </span>
            </p>

            <p  class="block text-gray-700 font-bold my-2">
                Categoria: <span class="font-normal"> {{ $vacante->salario->nombre}} </span>
            </p>

            <p  class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal"> {{ $vacante->ubicacion->nombre}} </span>
            </p>

            <p  class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal"> {{ $vacante->experiencia->nombre}} </span>
            </p>

            {{-- mostrando las skills --}}
            <h2 class="text-3xl text-center mt-10 text-gray-700 mb-5"> Skills </h2>

             @php
                $arraySkills = explode(",", $vacante->skills)
                // Con el explode convertimos el string en un array
            @endphp

            @foreach($arraySkills as $skill)

                <p  class="inline-block border border-gray-500 rounded py-2 px-8 text-gray-700 my-2">
                     {{ $skill}}
                </p>
            @endforeach

            {{-- mostrando la imagen de la vacante --}}
            <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title="Vacante {{ $vacante->titulo }}">
                <img src="/storage/vacantes/{{ $vacante->imagen }}" class="w-40 mt-10">
            </a>

            {{-- descripcion --}}
            <div class="descripcion mt-10 mb-5">

                {!!  $vacante->descripcion !!}
            </div>

        </div>

         @if($vacante->activa === 1) {{-- para evitar que puedan enviar solicitudes si esta inactiva la vacante --}}

        @include('ui.contacto')
        @endif
    </div>


@endsection
