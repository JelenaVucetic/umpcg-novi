<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('jmbg');
            $table->string('place');
            $table->string('phone');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('pib')->nullable();
            $table->string('date')->nullable();
            $table->string('address')->nullable();
            $table->string('web')->nullable();
            $table->string('work')->nullable();
            $table->string('organization')->nullable();
            $table->string('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('image');
            $table->string('genter');
            $table->dateTime('moderated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
