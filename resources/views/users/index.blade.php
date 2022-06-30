@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        @forelse ($users as $lol)
            <li>
                {{ $lol->nameChamp }}, ({{ $lol->posicion }})

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