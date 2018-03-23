<?php

namespace App\Http\Controllers;
use App\Rpv;
use App\Doc;
use Illuminate\Http\Request;
use App\Http\Requests\RpvRequest;
class RpvController extends Controller
{
    //
    public function create(Rpv $rpv)
    {
        $newRpv = $rpv->find(5);
        $docs = $newRpv->docs;
        //dd($newRpv->docs);
        return view('rpv/create');
    }


    public function store(RpvRequest $request,Doc $docs)
    {
        
        //dd($request->all());
        $newRpv = Rpv::create($request->all());
        
        if($request->hasFile('docs'))
        {
            if(is_array($request->file('docs')) || is_object($request->file('docs')))
            {
                foreach($request->file('docs') as $file)
                {
                $file->storeAs('docs',$file->getClientOriginalName());
                
                $doc = $docs->create([
                    'file'=> $file->getClientOriginalName()
                ]);
                $newRpv->docs()->attach($doc);
                echo $file->getClientOriginalName()."<br>";
                }
            }
            else
            {
            $file = $request->file('docs');
            $file->storeAs('docs',$file->getClientOriginalName());
            $doc = $docs->create([
                'file'=> $file->getClientOriginalName()
            ]);
            $newRpv->docs()->attach($doc);
            }
        }
    }
    public function list()
    {
        return view('rpv/create');
    }
}
