<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestations', function (Blueprint $table) {
            $table->id();
            // suppression en cascade si l'étudiant ou la convention n'existe plus
            $table->foreignId('id_etudiant')
            ->references('id')->on('etudiants')
            ->onDelete('cascade');
            $table->foreignId('id_convention')
            ->references('id')->on('conventions')
            ->onDelete('cascade');
            $table->text('message');
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
        Schema::dropIfExists('attestations');
    }
}
