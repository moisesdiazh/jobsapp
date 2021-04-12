@extends('layouts.app')


@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

    <div class="flex flex-col lg:flex-row shadow bg-white">

        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-3xl text-gray-700">

                Jobs<span class="font-bold">App</span>
            </p>

            <h1 class="mt-2 sm:mt-4 text-4xl font-bold text-gray-700 leading-tight">

                Las mejores opciones para trabajo remoto o en tu país
                <span class="text-green-500 block">Para Programadores o Diseñadores Web</span>
            </h1>

            @include('ui.buscador')

        </div>

        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('img/devjobs.jpg') }}" alt="jobsapp">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">

        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('ui.listadovacantes')
    </div>

@endsection
