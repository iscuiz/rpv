<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
class BankController extends Controller
{
    //
    public function create()
    {
        return view('bank/create');
    }

    public function store(Request $request)
    {
        $bank = Bank::create($request->all());
        return redirect()->back()->with('info','Banco Cadastrado com Sucesso');
    }
    public function list()
    {
        $banks = Bank::all();
        return view('bank/list',compact('banks'));
    }
    public function edit(Request $request)
    {
        $bank = Bank::findOrFail($request->id);
        if($bank)
        {
            return view("bank/edit",compact('bank'));
        }

        return redirect()->back()->with('erro','Banco não encontrado');
    }
    public function update(Request $request)
    {
        $bank = Bank::findOrFail($request->id);
        if($bank)
        {
            $bank->name = $request->name;
            $bank->save();

            return redirect()->back()->with('info','Banco Atualizado com sucesso');
        }


        return redirect()->back()->with('erro','Banco não encontrado');

    }

    public function delete(Request $request)
    {
        $bank = Bank::findOrFail($request->id);
        if($bank)
        {
            $bank->delete();
            return redirect()->back()->with('info','Banco excluido com sucesso');
        }
        return redirect()->back()->with('erro','Banco não encontrado');
    }
}
