<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('sender_id');
            $table->string('message_content');
            $table->timestamp('created_at')->nullable();

            $table->foreign('sender_id')->references('id')->
            on('members')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->
                on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
