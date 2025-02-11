<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $primaryKey = 'id'; // Ensure this is set if you're using a custom primary key name
    public $incrementing = false;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_settings', function (Blueprint $table) {
            $table->id();
            $table->string('model_name', 191)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_settings');
    }
};
