<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamp('submitted_at')->useCurrent();
            $table->integer('points')->nullable();
            $table->text('evaluation')->nullable();
            $table->timestamp('evaluated_at')->nullable();
            $table->foreignId('task_id')->constrained();
            $table->foreignId('user_id')->constrained(); // Student who submitted the solutio
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
        Schema::dropIfExists('solutions');
    }
};
