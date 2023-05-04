<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("nasabah_id");
            $table->date("transaction_date");
            $table->string("description");
            $table->string("debit_credit_status");
            $table->integer("amount");
            $table->integer("point")->nullable();
            $table->timestamps();

            $table->foreign("nasabah_id")->references("id")->on("nasabahs")
            ->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
