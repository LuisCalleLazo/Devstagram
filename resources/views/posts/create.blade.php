@extends('layouts.app')

@section('title')
    Crear una nueva Publicacion
@endsection

@section('content')
    <div class="flex items-center justify-around">
        <div class="w-1/2 px-10">
            Imagen aqui
        </div>

        <div class="w-1/2 bg-white rounded-lg p-10">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Titulo de la pubicacion"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500
                        @enderror"
                        value="{{old('title')}}"
                    />
                    @error('titulo')
                        <p class="text-red-500 my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Descripcion de la pubicacion"
                        class="border p-3 w-full rounded-lg text-gray-500
                        @error('name')
                            border-red-500
                        @enderror"
                    >{{old('description')}}</textarea>
                    @error('titulo')
                        <p class="text-red-500 my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>


                <input
                    type="submit"
                    value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection


