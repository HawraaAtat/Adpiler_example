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
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            //foreign key
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            //

            $table->string('file_name');
            $table->string('file_type');
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
        Schema::dropIfExists('files');
    }
};
