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
use App\Http\Requests\EmailRequest;
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
        $requestfileName = [];
        if($request->hasFile('docs'))
        {
            if(is_array($request->file('docs')) || is_object($request->file('docs')))
            {
                foreach($request->file('docs') as $file)
                {
                $file->storeAs('docs',$file->getClientOriginalName());
                $requestfileName[] = $file->getClientOriginalName();
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

       // dd(storage_path()."\app\\docs\\");
        //$this->dispatch(new SendRpvJob($requestfileName));
        return redirect()->back()->with('info','Rpv cadastrado com sucesso');

    }


    public function list(Rpv $rpv)
    {
         $rpvs = $rpv->all();
        return view('rpv/list',compact("rpvs"));
    }

    public function edit(Request $request)
    {
        $banks     = Bank::all();
        $moviments = Moviment::all();
        $processes = Process::all();
        $rpv = Rpv::findOrfail($request->id);

        if($rpv)
        {
            return view('rpv/edit',compact('rpv','banks','moviments','processes'));
        }
        return redirect()->back()->with('info','Rpv não encontrado');
    }
    public function update(RpvRequest $request)
    {
        $rpv = Rpv::findOrfail($request->id);
        if($rpv)
        {
            $rpv->name = $request->name;
            $rpv->cpf = $request->cpf;
            $rpv->rpv_process = $request->rpv_process;
            $rpv->origin_process = $request->origin_process;
            $rpv->stick = $request->stick;
            $rpv->process_type = $request->process_type;
            $rpv->contact = $request->contact;
            $rpv->deposit_date = $request->deposit_date;
            $rpv->moviment = $request->moviment;
            $rpv->bank = $request->bank;
            $rpv->save();
            return redirect()->back()->with('info','Rpv Atualizado');
        }
    }

    public function delete(Request $request)
    {
        $rpv = Rpv::findOrFail($request->id);
        if($rpv)
        {
            $rpv->delete();
            return redirect()->back()->with('info','Rpv excluido com sucesso');
        }
        return redirect()->back()->with('info','Rpv não encontrado');
    }
    public function createEmail()
    {
        return view('email/create');
    }
    public function sendEmail(EmailRequest $request)
    {
        $to      = $request->to;
        $subject = $request->subject;
        $msg     = $request->msg;
        $requestfileName = [];
        if($request->hasFile('docs'))
        {

            if(is_array($request->file('docs')) || is_object($request->file('docs')))
            {
                foreach($request->file('docs') as $file)
                {
                $file->storeAs('docs',$file->getClientOriginalName());
                $requestfileName[] = $file->getClientOriginalName();

                }
            }
            else
            {
            $file = $request->file('docs');

            $requestfileName = $file->getClientOriginalName();
            $file->storeAs('docs',$file->getClientOriginalName());
            $doc = $docs->create([
                'file'=> $file->getClientOriginalName()
            ]);
            }
        }
         $this->dispatch(new SendRpvJob($requestfileName,$to,$subject,$msg));

        return redirect()->back()->with("info","Email enviado com sucesso");
    }
}
