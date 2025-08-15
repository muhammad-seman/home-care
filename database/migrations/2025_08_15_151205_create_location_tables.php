<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->string('code', 10);
            $table->timestamps();
            
            $table->index('code');
        });

        Schema::create('regencies', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('province_id', 10);
            $table->string('name');
            $table->string('code', 10);
            $table->timestamps();
            
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->index(['province_id', 'code']);
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('regency_id', 10);
            $table->string('name');
            $table->string('code', 15);
            $table->timestamps();
            
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->index(['regency_id', 'code']);
        });

        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('address')->nullable();
            $table->string('province_id', 10)->nullable();
            $table->string('regency_id', 10)->nullable();
            $table->string('district_id', 15)->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->index(['latitude', 'longitude']);
            $table->index(['user_id', 'is_default']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_locations');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('regencies');
        Schema::dropIfExists('provinces');
    }
};