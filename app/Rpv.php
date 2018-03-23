<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpv extends Model
{
    //
    protected $fillable = [
        'name','cpf','rpv_process','origin_process','stick','contact','process_type','deposit_date'
    ];
    public function docs()
    {
        return $this->belongsTo(Doc::class);
    }

    public function moviment()
    {
        return $this->belongsTo(Moviment::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
