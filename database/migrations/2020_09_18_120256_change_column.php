<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users', function(Blueprint $table){})){
            Schema::table('users', function (Blueprint $table) {
                $table->string('image', 200)->nullable()->change();
            });
    
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('users', function(Blueprint $table){})){
            Schema::table('users', function (Blueprint $table) {
                $table->string('image', 200)->nullable(false)->change();
            });
    
        }
    }
}
