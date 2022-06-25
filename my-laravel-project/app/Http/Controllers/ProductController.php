<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{

    public function listProduct() 
    {
        $prod = Product::all();
        return response()->json($prod);
    }

    public function storeProduct(Request $request) 
    {
        $prod = new Product;
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;

        return ($prod->save()) ? response()->json($prod) : response()->json("Erro ao salvar o produto");
    }

    public function updateProduct($id, Request $request) 
    {
        $prod = Product::find($id);
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;

        return ($prod->save()) ? response()->json($prod) : response()->json("Erro ao atualizar o produto");
    }

    public function removeProduct($id, Request $request) 
    {
        $prod = Product::find($id);
        return ($prod->delete()) ? response()->json($prod) : response()->json("Erro ao deletar o produto");
    }

}
