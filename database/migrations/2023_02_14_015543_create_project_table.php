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
        Schema::disableForeignKeyConstraints();
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name_project', 25);
            $table->string('spk', 10)->unique();
            $table->string('work', 100);
            $table->enum('status_note', ['0', '1'])->default('0');
            $table->enum('status_project', ['0', '1'])->default('0');
            $table->string('price');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('project');
        Schema::enableForeignKeyConstraints();
    }
};
