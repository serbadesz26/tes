<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovid19Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid19', function (Blueprint $table) {
            $table->id();

            // Pangkalpinang
            $table->integer('pkp_t')->default('0')->nullable();
            $table->integer('pkp_s')->default('0')->nullable();
            $table->integer('pkp_m')->default('0')->nullable();
            $table->integer('pkp_a')->default('0')->nullable();

            $table->integer('pkp_td')->default('0')->nullable();
            $table->integer('pkp_sd')->default('0')->nullable();
            $table->integer('pkp_md')->default('0')->nullable();
            $table->integer('pkp_ad')->default('0')->nullable();

            // Bangka
            $table->integer('bka_t')->default('0')->nullable();
            $table->integer('bka_s')->default('0')->nullable();
            $table->integer('bka_m')->default('0')->nullable();
            $table->integer('bka_a')->default('0')->nullable();

            $table->integer('bka_td')->default('0')->nullable();
            $table->integer('bka_sd')->default('0')->nullable();
            $table->integer('bka_md')->default('0')->nullable();
            $table->integer('bka_ad')->default('0')->nullable();

            // Belitung
            $table->integer('blt_t')->default('0')->nullable();
            $table->integer('blt_s')->default('0')->nullable();
            $table->integer('blt_m')->default('0')->nullable();
            $table->integer('blt_a')->default('0')->nullable();

            $table->integer('blt_td')->default('0')->nullable();
            $table->integer('blt_sd')->default('0')->nullable();
            $table->integer('blt_md')->default('0')->nullable();
            $table->integer('blt_ad')->default('0')->nullable();

            // Bangka Barat
            $table->integer('bkb_t')->default('0')->nullable();
            $table->integer('bkb_s')->default('0')->nullable();
            $table->integer('bkb_m')->default('0')->nullable();
            $table->integer('bkb_a')->default('0')->nullable();

            $table->integer('bkb_td')->default('0')->nullable();
            $table->integer('bkb_sd')->default('0')->nullable();
            $table->integer('bkb_md')->default('0')->nullable();
            $table->integer('bkb_ad')->default('0')->nullable();

            // Bangka Tengah
            $table->integer('bkt_t')->default('0')->nullable();
            $table->integer('bkt_s')->default('0')->nullable();
            $table->integer('bkt_m')->default('0')->nullable();
            $table->integer('bkt_a')->default('0')->nullable();

            $table->integer('bkt_td')->default('0')->nullable();
            $table->integer('bkt_sd')->default('0')->nullable();
            $table->integer('bkt_md')->default('0')->nullable();
            $table->integer('bkt_ad')->default('0')->nullable();

            // Bangka Selatan
            $table->integer('bks_t')->default('0')->nullable();
            $table->integer('bks_s')->default('0')->nullable();
            $table->integer('bks_m')->default('0')->nullable();
            $table->integer('bks_a')->default('0')->nullable();

            $table->integer('bks_td')->default('0')->nullable();
            $table->integer('bks_sd')->default('0')->nullable();
            $table->integer('bks_md')->default('0')->nullable();
            $table->integer('bks_ad')->default('0')->nullable();

            // Belitung Timur
            $table->integer('btm_t')->default('0')->nullable();
            $table->integer('btm_s')->default('0')->nullable();
            $table->integer('btm_m')->default('0')->nullable();
            $table->integer('btm_a')->default('0')->nullable();

            $table->integer('btm_td')->default('0')->nullable();
            $table->integer('btm_sd')->default('0')->nullable();
            $table->integer('btm_md')->default('0')->nullable();
            $table->integer('btm_ad')->default('0')->nullable();

            $table->integer('status')->default('0')->nullable();

            $table->date('tgl_data')->nullable();

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
        Schema::dropIfExists('covid19');
    }
}
