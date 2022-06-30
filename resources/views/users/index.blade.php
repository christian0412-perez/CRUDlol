@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        @forelse ($users as $lol)
            <li>
                {{ $lol->nameChamp }}, ({{ $lol->posicion }})
                <form action="/usuarios/{$lol}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection

@section('sidebar')
    @parent
@endsection