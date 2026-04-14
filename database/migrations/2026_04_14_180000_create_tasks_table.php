<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Tasks', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Title', 64);
            $table->boolean('IsDone');
            $table->dateTime('StartDateTime');
            $table->text('Description');
            $table->dateTime('Deadline');
            $table->unsignedInteger('InternalEventId');
            $table->dateTime('CreationDateTime');
            $table->dateTime('EditDateTime');
            $table->text('Notes')->nullable();
            $table->boolean('IsActive');

            $table->foreign('InternalEventId')->references('Id')->on('InternalEvents');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Tasks');
    }
};
