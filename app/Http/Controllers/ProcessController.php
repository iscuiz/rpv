<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Process;
class ProcessController extends Controller
{
    //
    public function create()
    {
        return view('process/create');
    }

    public function store(Request $request)
    {
        $process = Process::create($request->all());
        return redirect()->back()->with('sucess','Tipo de Processo cadastrado com sucesso');
    }
    public function list()
    {
        return view('process/list');
    }
}
