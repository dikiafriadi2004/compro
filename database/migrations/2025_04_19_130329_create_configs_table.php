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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('web_name');
            $table->string('nama_pt');
            $table->string('favicon');
            $table->string('logo');
            $table->longText('meta_description');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('whatsapp');
            $table->string('telegram');
            $table->longText('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
