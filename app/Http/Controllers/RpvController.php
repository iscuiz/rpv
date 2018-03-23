<?php

namespace App\Http\Controllers;
use App\Rpv;
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
        

        $newRpv = Rpv::create($request->all());
        dd($newRpv);
        if($request->hasFile('docs'))
        {
            if(is_array($request->file('docs')) || is_object($request->file('docs')))
            {
                foreach($request->file('docs') as $file)
                {
                $file->storeAs('docs',$file->getClientOriginalName());
                echo $file->getClientOriginalName()."<br>";
                }
            }
            else
            {
            $file = $request->file('docs');
            $file->storeAs('docs',$file->getClientOriginalName());
            }
        }
    }
    public function list()
    {
        return view('rpv/list');
    }
}
