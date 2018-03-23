<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RpvRequest;
class RpvController extends Controller
{
    //
    public function create()
    {
        return view('rpv/create');
    }

    public function store(RpvRequest $request)
    {
        if($request->hasFile('docs'))
        {
            foreach($request->file('docs') as $file)
            {
                $file->storeAs('docs',$file->getClientOriginalName().'.'.$file->getClientOriginalExtension());
                echo $file->getClientOriginalName()."<br>";
            }
        }
    }
    public function list()
    {
        return view('rpv/list');
    }
}
