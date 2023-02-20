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
        Schema::create('resolveds', function (Blueprint $table) {
            $table->id();

            //foreign key
            $table->integer('comment_id')->nullable();
            $table->integer('resolved_by')->nullable(); //(FK _ Members table)
            //

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
        Schema::dropIfExists('resolveds');
    }
};
