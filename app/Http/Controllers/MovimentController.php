<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moviment;
class MovimentController extends Controller
{
    public function create()
    {
        return view('moviment/create');
    }

    public function store(Request $request)
    {
        
        $moviment = Moviment::create($request->all());

        return redirect()->back()->with('sucess','Movimentação Cadastrada com Sucesso');
    }
}
