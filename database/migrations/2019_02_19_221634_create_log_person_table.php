<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogPersonTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('tblogperson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->date('birthday');
            $table->char('sex', 1);
            $table->smallInteger('age')->nullable(true);
            $table->smallInteger('birthsign')->nullable(true);
            $table->timestamp('log_at');
        });

        DB::statement("ALTER TABLE tblogperson ADD CONSTRAINT chk_sex CHECK (sex in ('M', 'F'));");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(){
        Schema::dropIfExists('tblogperson');
    }
}
