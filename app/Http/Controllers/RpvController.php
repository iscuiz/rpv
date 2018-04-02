<?php

namespace App\Http\Controllers;
use App\Rpv;
use App\Doc;
use App\Bank;
use App\Process;
use App\Moviment;
use Illuminate\Http\Request;
use App\Http\Requests\RpvRequest;
use App\Jobs\SendRpvJob;
class RpvController extends Controller
{
    //
    public function create(Rpv $rpv,Bank $bank,Moviment $moviment)
    {
        $banks     = $bank->all();
        $moviments = $moviment->all();
        $processes = Process::all();
        return view('rpv/create',compact('banks','moviments','processes'));
    }


    public function store(RpvRequest $request,Doc $docs)
    {
        
        //dd($request->all());
        $newRpv = Rpv::create($request->all());
        $requestfileName = "";
        if($request->hasFile('docs'))
        {
            if(is_array($request->file('docs')) || is_object($request->file('docs')))
            {
                foreach($request->file('docs') as $file)
                {
                $file->storeAs('docs',$file->getClientOriginalName());
                $requestfileName = $file->getClientOriginalName();
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

        $this->dispatch(new SendRpvJob($requestfileName));

    }


    public function list(Rpv $rpv)
    {   $rpvs = $rpv->all();
        return view('rpv/list',compact("rpvs"));
    }
}
