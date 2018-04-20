    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf',11);
            $table->string('rpv_process');
            $table->string("origin_process");
            $table->string("stick");
            $table->string('process_type');
            $table->string("contact");
            $table->string("deposit_date");
            $table->string('moviment');
            $table->string('bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpvs');
    }
}
