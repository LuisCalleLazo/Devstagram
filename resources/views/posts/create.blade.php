@extends('layouts.app')

@section('title')
    Crear una nueva Publicacion
@endsection

@section('content')
    <div class="flex items-center justify-around">
        <div class="w-1/2 px-10">
            Imagen aqui
        </div>

        <div class="w-1/2 bg-white rounded-lg">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500
                        @enderror"
                        value="{{old('name')}}"
                    />
                    @error('name')
                        <p class="text-red-500 my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection


