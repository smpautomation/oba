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
        Schema::create('checklist', function (Blueprint $table) {
            $table->unsignedBigInteger('id', false)->primary();
            $table->string('model');
            $table->string('section');
            $table->json('preparationChecklist')->nullable();
            $table->json('obakitchecklist')->nullable();
            $table->json('shipmentInformation')->nullable();
            $table->json('checkItems')->nullable();
            $table->json('checkOverallCondition')->nullable();
            $table->json('personnel')->nullable();
            $table->timestamps();
        });

        Schema::create('checkingSimilarities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained(
                table: 'checklist', indexName: 'id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->string('comparison_type');
            $table->json('field_values');
            $table->boolean('same');
            $table->boolean('judgement');
            $table->timestamps();
        });

        // Schema::create('preparationChecklist', function (Blueprint $table) {
        //     //$table->unsignedBigInteger('checklist_id');
        //     $table->foreignId('checklist_id')->constrained(
        //         table: 'checklist', indexName: 'id'
        //     )->onUpdate('cascade')->onDelete('cascade');
        //     $table->boolean('1_complete_mcReceivingChecklist');
        //     $table->boolean('1_complete_obaKit');
        //     $table->boolean('1_complete_packingSpecs');
        //     $table->boolean('1_complete_serem');
        //     $table->boolean('1_complete_pickList');
        //     $table->boolean('1_complete_fgLotTrace');
        //     $table->boolean('1_complete_scannedQRCode');
        //     $table->boolean('1_complete_packingSlip');
        //     $table->boolean('1_complete_relatedDocuments');
        //     $table->string('1_remarks_mcReceivingChecklist');
        //     $table->string('1_remarks_obaKit');
        //     $table->string('1_remarks_packingSpecs');
        //     $table->string('1_remarks_serem');
        //     $table->string('1_remarks_pickList');
        //     $table->string('1_remarks_fgLotTrace');
        //     $table->string('1_remarks_scannedQRCode');
        //     $table->string('1_remarks_packingSlip');
        //     $table->string('1_remarks_relatedDocuments');
        //     $table->timestamps();
        // });

        // Schema::create('obakitchecklist', function (Blueprint $table) {
        //     $table->foreignId('checklist_id')->constrained(
        //         table: 'checklist', indexName: 'id'
        //     )->onUpdate('cascade')->onDelete('cascade');
        //     $table->boolean('2_beforeOba_calculator');
        //     $table->boolean('2_beforeOba_camera');
        //     $table->boolean('2_beforeOba_cutter');
        //     $table->boolean('2_beforeOba_stampPad');
        //     $table->boolean('2_beforeOba_stamp');
        //     $table->boolean('2_beforeOba_tapeDispenser');
        //     $table->boolean('2_beforeOba_zebraPen');
        //     $table->boolean('2_afterOba_calculator');
        //     $table->boolean('2_afterOba_camera');
        //     $table->boolean('2_afterOba_cutter');
        //     $table->boolean('2_afterOba_stampPad');
        //     $table->boolean('2_afterOba_stamp');
        //     $table->boolean('2_afterOba_tapeDispenser');
        //     $table->boolean('2_afterOba_zebraPen');
        //     $table->timestamps();
        // });

        // Schema::create('shipmentInformation', function (Blueprint $table) {
        //     $table->foreignId('checklist_id')->constrained(
        //         table: 'checklist', indexName: 'id'
        //     )->onUpdate('cascade')->onDelete('cascade');
        //     $table->dateTime('3_shipmentDateTime');
        //     $table->string('3_modelName');
        //     $table->string('3_invoiceNumber');
        //     $table->boolean('3_palletWood');
        //     $table->boolean('3_palletPaper');
        //     $table->boolean('3_palletSteel');
        //     $table->boolean('3_palletPlastic');
        //     $table->string('3_palletOthers');
        //     $table->timestamps();
        // });

        // Schema::create('checkItems', function (Blueprint $table) {
        //     $table->foreignId('checklist_id')->constrained(
        //         table: 'checklist', indexName: 'id'
        //     )->onUpdate('cascade')->onDelete('cascade');
        //     $table->integer('4_boxesOpen');
        //     $table->boolean('4_sameModel');
        //     $table->boolean('4_judgement');
        //     $table->string('4_whatModel');
        //     $table->integer('4_cartons');
        //     $table->boolean('4_specialInspectionReport');
        //     $table->boolean('4_specialInspectionReportAvailability');
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist');
        Schema::dropIfExists('checkingsimilarities');
    }
};
