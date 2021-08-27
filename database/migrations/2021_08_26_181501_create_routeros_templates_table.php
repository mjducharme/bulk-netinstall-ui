<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterosTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeros_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->unsignedInteger('routeros_main_package_id');
            $table->unsignedInteger('routeros_branding_package_id')->nullable();
            $table->unsignedInteger('routeros_default_configuration_id')->nullable();
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
        Schema::dropIfExists('routeros_templates');
    }
}
