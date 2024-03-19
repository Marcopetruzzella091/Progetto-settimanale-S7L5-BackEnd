<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('stato_richiesta') ->default('in attesa di approvazione'); ;
            $table->string('numero_sala');
            $table->text('data_prenotazione');
            $table->string('fascia_oraria');
           
            
            $table->foreignId('course_id');
            $table->foreign('course_id')->references('id')->on('courses')
                    ->onUpdate('cascade')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
