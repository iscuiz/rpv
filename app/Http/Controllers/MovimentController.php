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

        return redirect()->back()->with('info','Movimentação Cadastrada com Sucesso');
    }
    public function list()
    {
        $moviments = Moviment::all();
        return view('moviment/list',compact('moviments'));
    }
    public function edit(Request $request)
    {
        $moviment = Moviment::findOrFail($request->id);
        if($moviment)
        {
            return view('moviment/edit',compact('moviment'));
        }
    }
    public function update()
    {

    }

    public function delete(Request $request)
    {
        $moviment = Moviment::findOrFail($request->id);
        if($moviment)
          {
            $moviment->delete();
            return redirect()->back()->with('info','Movimentação  excluida com sucesso');
        }
        return redirect()->back()->with('info','Rpv não encontrado');
    }

}
