<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->integer('volume')->nullable();           
        $table->string('longevity')->nullable();         
        $table->string('type')->nullable();              
        $table->string('gender')->nullable();            
                       
    });
}

    /**
     * Reverse the migrations.
     */
   public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['volume', 'longevity', 'type', 'gender']);
    });
}
};
