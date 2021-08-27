<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterosMainPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeros_main_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename', 60);
            $table->unsignedInteger('routeros_architecture_id');
            $table->unsignedInteger('routeros_version_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routeros_main_packages');
    }
}
