<?php

use Illuminate\Database\Seeder;
use App\Bank;
use App\Moviment;
use App\Process as  TypeProccess;
use Symfony\Component\Process\Process;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = Bank::create([
            'name'=>"BB"
        ]);
        $process = TypeProccess::create([
            'type'=>'tipo1'
        ]);
        $moviment = Moviment::create([
            'name'=>'testes2'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
