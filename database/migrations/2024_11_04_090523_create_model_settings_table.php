<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{  
    use HasFactory;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_settings', function (Blueprint $table) {
            $table->id();
            $table->string('model_name', 191)->index();
            $table->boolean("scanned_qr_pc")->default(true);
            $table->boolean("sir_qs")->default(true);
            $table->boolean("vmi_mn")->default(true);
            $table->boolean("sir_mc")->default(true);
            $table->boolean("vmi_mc")->default(true);
            $table->boolean("specific_label_mc")->default(true);
            $table->boolean("picklist_pn")->default(true);
            $table->boolean("sir_pn")->default(true);
            $table->boolean("vmi_pn")->default(true);
            $table->boolean("sir_po")->default(true);
            $table->boolean("vmi_po")->default(true);
            $table->boolean("specific_label_po")->default(true);
            $table->timestamps();
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
