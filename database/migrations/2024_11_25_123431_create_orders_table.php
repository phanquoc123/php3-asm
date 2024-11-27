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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('user_name',255);
            $table->string('user_email',255);
            $table->string('user_phone',255);
            $table->string('user_adress',255);
            $table->string('shipping_name',255);
            $table->string('shipping_email',255);
            $table->string('shipping_phone',255);
            $table->string('shipping_adress',255);
            $table->enum('status_delivery',['0','1','2','3','4','5']);
            $table->enum('status_payment',['0','1']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
