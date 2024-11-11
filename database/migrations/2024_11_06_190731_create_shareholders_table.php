<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shareholders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('country');
            $table->string('nationality');
            $table->decimal('shares', 10, 2);
            $table->string('remark'); // Amount of shares owned
            $table->string('shareholder_documents');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('mobile');
            // $table->string('shCountry');
            // $table->string('shNationality');
            // $table->string('remark');
            // $table->decimal('shares', 10, 2); // Amount of shares owned
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shareholders');
    }
};
