<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bidans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('license_number')->unique();
            $table->json('specializations')->nullable();
            $table->text('bio')->nullable();
            $table->integer('experience_years')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_reviews')->default(0);
            $table->decimal('commission_rate', 5, 2)->default(10.00);
            $table->boolean('is_verified')->default(false);
            $table->enum('availability_status', ['available', 'busy', 'offline'])->default('offline');
            $table->timestamps();
            
            $table->index(['is_verified', 'availability_status']);
            $table->index(['rating', 'total_reviews']);
        });

        Schema::create('bidan_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidan_id')->constrained('bidans')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->decimal('custom_price', 15, 2)->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            
            $table->unique(['bidan_id', 'service_id']);
            $table->index(['bidan_id', 'is_available']);
        });

        Schema::create('bidan_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('license_number');
            $table->json('documents')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bidan_requests');
        Schema::dropIfExists('bidan_services');
        Schema::dropIfExists('bidans');
    }
};