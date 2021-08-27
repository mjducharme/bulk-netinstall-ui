<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetinstallInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('netinstall_interfaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('interface_name', 30);
            $table->string('interface_ip_mask_cidr', 18);
            $table->string('bootp_client_ip', 15);
            $table->timestamps();
            $table->softDeletes();
            $table->string('interface_friendly_name', 30);
            $table->unsignedInteger('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('netinstall_interfaces');
    }
}
