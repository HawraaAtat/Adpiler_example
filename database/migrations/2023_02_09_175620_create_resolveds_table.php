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

            // foreign key
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('resolved_by')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->foreign('resolved_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
