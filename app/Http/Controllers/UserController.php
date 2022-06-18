<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran Usuarios registrados.',
            ]);
        }
        return response($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4|max:30|unique:users,name',
                'email' => 'required|max:30|unique:users,email',
                'rut' => ''
            ],
            [
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre debe ser de largo mínimo :min',
                'name.max' => 'El nombre debe ser de largo máximo :max',
                'email.required' => 'Debe ingresar un correo electronico',
                'email.unique' => 'El correo electronico ya existe',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = new User;
        $user->name = $request->name;               //Se pide un usuario que no exista
        $user->email = $request->email;             //email con formato email
        $user->rut = $request->rut;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            'respuesta' => 'Se ha registrado un nuevo usuario.',
            'id' => $user->id,
            'nombre' => $user->name,
            'correo' => $user->email,
            'rut' => $user->rut,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = User::find($id);
        if (empty($subject)) {
            return response()->json('El Usuario ingresado no existe.');
        }
        return response($subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|max:30|unique:users,email',
                'rut' => 'required'
            ],
            [
                'name.required'=>'Debes ingresar un nombre',
                'name.min'=>'El nombre debe ser de largo mínimo :min',
                'name.max'=>'El nombre debe ser de largo máximo :max',
                'email.required' => 'Debe ingresar un correo electronico',
                'email.unique' => 'El correo electronico ya existe',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['User no válido.']);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rut = $request->rut;


        $user->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el Usuario.',
            'id' => $user->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    //Funciona correctamente
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json([]);
        }
        $user->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el usuario.',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'rut' => $user->rut,
        ], 200);
    }

    public function restore($id)    //Funciona Correctamente
    {
        $user = User::onlyTrashed()->find($id);
        if (empty($user)) {
            return response()->json(['El usuario no ha sido desactivado con anterioridad.']);
        }
        $user->restore();
        return response()->json([
            'respuesta' => 'Se ha desactivado el usuario.',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'rut' => $user->rut,
        ], 200);
    }
}
