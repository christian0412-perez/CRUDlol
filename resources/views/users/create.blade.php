@extends('layout')

@section('title', "Crear usuario")

@section('content')
    <h1>Crear usuario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Por favor corrige los errores debajo:</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ url('usuarios') }}">
        {{ csrf_field() }}

        <label for="nameChamp">Nombre del campeon:</label>
        <input type="text" name="nameChamp" id="nameChamp" placeholder="ej. Nunu y Willump" value="{{ old('nameChamp') }}">
        <br>
        <label for="descripcion">descripcion del campeon:</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="ej. un niño y su yeti" value="{{ old('descripcion') }}">
        <br>
        <label for="posicion">posicion del campeon:</label>
        <input type="text" name="posicion" id="posicion" placeholder="ej. Jungla" value="{{ old('posicion') }}">
        <br>
        <label for="rolChamp">Rol del campeon:</label>
        <input type="text" name="rolChamp" id="rolChamp" placeholder="ej. Tanque" value="{{ old('rolChamp') }}">
        <br>
        <button type="submit">Crear</button>
    </form>

    <p>
        <a href="{{ route('users.index') }}">Regresar</a>
    </p>
@endsection