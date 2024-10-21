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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            //Contact Information
            $table->string('contact_name');
            $table->string('contact_email')->unique();
            $table->string('contact_phone_number');

            //Company Information
            $table->string('company_name');
            $table->integer('company_vat');
            $table->string('company_address');
            $table->string('company_city');
            $table->string('company_zip');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
