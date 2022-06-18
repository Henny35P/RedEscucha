<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        if ($comments->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran comentarios',
            ]);
        }
        return response($comments, 200);
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
                'comentario' => 'required|min:2|max:50',
                'id_user' => 'required'

            ],
            [
                'comentario.required' => 'Debe ingresar un comentario',
                'comentario.min' => 'El comentario debe tener un largo minimo de 2',
                'comentario.max' => 'El comentario debe tener menos de 50',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $comments = new Comment();
        $comments->comentario = $request->comentario;
        $comments->id_user = $request->id_user;
        $comments->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo comentario',
            'id' => $comments->id
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
        $comments = Comment::find($id);
        if (empty($comments)) {
            return response()->json([]);
        }
        return response($comments, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
                'comentario' => 'required|min:2|max:50',
                'id_user' => 'required'

            ],
            [
                'comentario.required' => 'Debe ingresar un comentario',
                'comentario.min' => 'El comentario debe tener un largo minimo de 2',
                'comentario.max' => 'El comentario debe tener menos de 50',
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors());
        }
        $comments = new Comment();
        $comments->comentario = $request->comentario;
        $comments->id_user = $request->id_user;
        $comments->save();
        $comments = Comment::find($id);
        if (empty($comments)) {
            return response()->json([]);
        }
        $comments->comentario = $request->comentario;
        return response()->json([
            'respuesta' => 'Se ha modificado un nuevo comentario',
            'id' => $comments->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);
        if (empty($comments)) {
            return response()->json([]);
        }
        $comments->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el comentario',
            'id' => $comments->id,
            'comentario' => $comments->comentario,
        ], 200);
    }

    public function restore($id)
    {
        $comments = Comment::onlyTrashed()->find($id);
        if (empty($comments)) {
            return response()->json([]);
        }
        $comments->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el comentario',
            'id' => $comments->id,
            'comentario' => $comments->comentario,
        ], 200);
    }

}
