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
        return redirect()->back()->with('sucess','Banco Cadastrado com Sucesso');
    }
}
