<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // project
            $table->integer('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->nullable();
            $table->string('path'); // path of the copy 
            $table->boolean('recursive')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
}
