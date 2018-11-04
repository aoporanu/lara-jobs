<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompaniesAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('companies', function(Blueprint $table) {
             $table->string('cover')->nullable();
             $table->string('slogan')->nullable();
             $table->text('description');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('companies', function(Blueprint $table) {
             $table->dropColumn('cover');
             $table->dropColumn('slogan');
             $table->dropColumn('description');
         });
     }
}
