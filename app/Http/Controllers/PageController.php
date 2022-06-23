<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        // $users = User::all();

        $title = 'Lista de usuarios';

//        return view('users.index')
//            ->with('users', User::all())
//            ->with('title', 'Listado de usuarios');

        return view('users.index', compact('title', 'users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $data = request()->validate([
            'nameChamp' => 'required',
            'descripcion' => 'required',
            'posicion' => 'required',
            'rolChamp' => 'required',
            
        ], [
            'nameChamp.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'posicion.required' => 'El campo posicion es obligatorio',
            'rolChamp.required' => 'El campo rol es obligatorio',
        ]);

        // User::create([
        //     'nameChamp' => $data['nameChamp'],
        //     'descripcion' => $data['descripcion'],
        //     'posicion' => $data['posicion'],
        //     'rolChamp' => $data['rolChamp'],
        // ]);
        DB::table('champs')->insert([
            'nameChamp' => $data['nameChamp'],
            'descripcion' => $data['descripcion'],
            'posicion' => $data['posicion'],
            'rolChamp' => $data['rolChamp'],
        ]);
        return 'parece que todo esta bien';
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
    }

    function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}