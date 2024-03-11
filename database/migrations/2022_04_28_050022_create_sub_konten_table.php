<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKontenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_konten', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('konten')->nullable(true);
            $table->boolean('status')->default(0);

            $table->unsignedBigInteger('konten_id');

            $table->foreign('konten_id')
                ->references('id')->on('konten')
                ->onDelete('cascade');

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
        Schema::dropIfExists('sub_konten');
    }
}
