<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Product;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comm = Comment::all();
        return response()->json($comm);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $comm = new Comment();
            $comm->nickname = $request->nickname;
            $comm->text = $request->text;
            $comm->product_id = $request->product_id;

            return ($comm->save()) ? response()->json('Comentário salvo!') : throw new Exception('Erro ao salvar o comentário!');
            
        }   catch(Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace(),
            ];
        }
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
        {
            try {
                $comm = Comment::find($id);
                $comm->nickname = $request->nickname;
                $comm->text = $request->text;
                $comm->product_id = $request->product_id;
    
                return ($comm->save()) ? response()->json('Comentário atualizado!') : throw new Exception('Erro ao atualizar o comentário!');
                
            }   catch(Exception $e) {
                return [
                    'msg' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTrace(),
                ];
            }
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $comm = Comment::find($id);
            return ($comm->delete()) ? response()->json('Comentário deletado!') : throw new Exception('Erro ao deletar o comentário!');    
        }
    }
}
