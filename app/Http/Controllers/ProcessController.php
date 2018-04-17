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
        $process = Process::all();
        return view('process/list',compact('process'));
    }

    public function edit(Request $request)
    {
        $process = Process::findOrFail($request->id);
        if($process)
        {
            return view('process/edit',compact('process'));
        }
        return redirect()->back();
    }

    public function update()
    {

    }

    public function delete()
    {
        
    }
}
