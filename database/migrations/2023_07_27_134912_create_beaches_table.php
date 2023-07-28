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
        Schema::create('beaches', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("location");
            $table->unsignedTinyInteger("umbrella_number");
            $table->unsignedTinyInteger("sunbed_number");
            $table->unsignedFloat("umbrella_price_per_day");
            $table->date("opening_date");
            $table->date("closing_date");
            $table->boolean("beachvolley_court");
            $table->boolean("football_court");
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
        Schema::dropIfExists('beaches');
    }
};
