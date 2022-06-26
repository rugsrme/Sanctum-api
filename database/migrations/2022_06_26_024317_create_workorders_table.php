<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workorders', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->text('desc')->nullable();
            $table->string('user_name');
            $table->enum('priority', ['low', 'med', 'high'])->nullable();
            $table
            ->enum('status', ['open', 'closed', 'request'])
            ->nullable();
            $table->enum('assigned_to', ['maint', 'housekeep', 'nursing', 'laundry', 'dietary', 'activities', 'social', 'mds', 'admin'])->nullable();
            $table->foreignId('user_id');
            $table->foreignId('location_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('workorders');
    }
};
