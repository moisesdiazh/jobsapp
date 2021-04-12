@extends('layouts.app')

{{-- lo traemos todo del show de categorias --}}
@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

    @if(count($vacantes) > 0)
    <div class="my-10 bg-gray-100 p-10 shadow">

        <h1 class="text-3xl text-gray-700 m-0">
            Resultados ({{ count($vacantes)}})
        </h1>

        @include('ui.listadovacantes')
    </div>

    @else

        <p class="text-center text-gray-700">No se encontraron vacantes :(</p>
    @endif

@endsection
