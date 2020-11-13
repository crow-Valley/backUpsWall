<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            // Name
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('ip')->nullable();
            $table->string('domain_name')->nullable();
            $table->boolean('copy_files')->default(true);
            // FTP acces
            $table->string('ftp_port')->nullable();
            $table->string('ftp_user')->nullable();
            $table->string('ftp_password')->nullable();
            $table->string('ftp_host')->nullable(); 
            // DB acces
            $table->string('db_user')->nullable();
            $table->string('db_password')->nullable();
            $table->string('db_host')->nullable();
            $table->string('db_port')->default(3306);
            $table->string('db_connection')->default('mysql');
            $table->string('db_name')->nullable();

            
            // config
            $table->string('status')->default('success'); // success, canceled, failed, stopped
            $table->string('copy_every')->default('day');
            $table->time('copy_at')->default('00:00');
            $table->double('max_memory_gb')->nullable(); 




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
