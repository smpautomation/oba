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
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')
                ->references('id')
                ->on('section')
                ->onUpdate('cascade');
            $table->string('model_name', 191)->index();
            $table->boolean("scanned_qr_pc")->default(false);
            $table->boolean("sir_qs")->default(false);
            $table->boolean("vmi_mn")->default(false);
            $table->boolean("sir_mn")->default(false);
            $table->boolean("sir_mc")->default(false);
            $table->boolean("vmi_mc")->default(false);
            $table->boolean("specific_label_mc")->default(false);
            $table->boolean("sir_pn")->default(false);
            $table->boolean("vmi_pn")->default(false);
            $table->boolean("sci_label_pn")->default(false);
            $table->boolean("qr_qa_pn")->default(false);
            $table->boolean("qr_mc_pn")->default(false);
            $table->boolean("qr_mgtz_pn")->default(false);
            $table->boolean("sir_po")->default(false);
            $table->boolean("vmi_po")->default(false);
            $table->boolean("specific_label_po")->default(false);
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
