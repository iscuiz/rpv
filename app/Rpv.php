<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpv extends Model
{
    //
    protected $fillable = [
        'name','cpf','rpv_process',
        'origin_process','stick',
        'contact','process_type',
        'deposit_date',
        'moviment',
        'bank'
    ];
    public function docs()
    {
        return $this->belongsToMany(Doc::class,'rpv_doc','rpv_id','doc_id');
    }

    public function moviment()
    {
        return $this->belongsTo(Moviment::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function process()
    {
        return $this->belongsTo(Process::class,'process_type');
    }
}
