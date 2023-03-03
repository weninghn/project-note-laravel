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
        Schema::table('project', function (Blueprint $table) {
            $table->date('start_project')->after('price');
            $table->date('end_project')->after('start_project');
            $table->date('start_garansi')->after('end_project');
            $table->date('end_garansi')->after('start_garansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropColumn('start_project');
            $table->dropColumn('end_project');
            $table->dropColumn('start_garansi');
            $table->dropColumn('end_garansi');
        });
    }
};
