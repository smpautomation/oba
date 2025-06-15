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
            $table->timestamps();
        });

        Schema::create('preparation_checklist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('oneprep2column')->nullable();
            $table->boolean('oneprep3column')->nullable();
            $table->boolean('oneprep4column')->nullable();
            $table->boolean('oneprep5column')->nullable();
            $table->boolean('oneprep6column')->nullable();
            $table->boolean('oneprep7column')->nullable();
            $table->boolean('oneprep8column')->nullable();
            $table->boolean('oneprep9column')->nullable();
            $table->boolean('oneprep10column')->nullable();
            $table->string('oneprep2remarks')->nullable();
            $table->string('oneprep3remarks')->nullable();
            $table->string('oneprep4remarks')->nullable();
            $table->string('oneprep5remarks')->nullable();
            $table->string('oneprep6remarks')->nullable();
            $table->string('oneprep7remarks')->nullable();
            $table->string('oneprep8remarks')->nullable();
            $table->string('oneprep9remarks')->nullable();
            $table->string('oneprep10remarks')->nullable();
        });

        Schema::create('o_b_a__kit__checklists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('beforecheckbox1')->nullable();
            $table->boolean('beforecheckbox2')->nullable();
            $table->boolean('beforecheckbox3')->nullable();
            $table->boolean('beforecheckbox4')->nullable();
            $table->boolean('beforecheckbox5')->nullable();
            $table->boolean('beforecheckbox6')->nullable();
            $table->boolean('beforecheckbox7')->nullable();
            $table->boolean('aftercheckbox1')->nullable();
            $table->boolean('aftercheckbox2')->nullable();
            $table->boolean('aftercheckbox3')->nullable();
            $table->boolean('aftercheckbox4')->nullable();
            $table->boolean('aftercheckbox5')->nullable();
            $table->boolean('aftercheckbox6')->nullable();
            $table->boolean('aftercheckbox7')->nullable();
        });

        Schema::create('shipment_information', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('datetime', 16)->nullable();
            $table->string('model_name')->nullable();
            $table->string('invoice_number')->nullable();
            $table->boolean('wood')->nullable();
            $table->boolean('paper')->nullable();
            $table->boolean('steel')->nullable();
            $table->boolean('plastic')->nullable();
            $table->string('others')->nullable()->default("");
        });

        Schema::create('check_items', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('open_boxes_quantity')->nullable()->default(1);
            $table->boolean('same_model')->nullable()->default(false);
            $table->string('specify_model')->nullable();
            $table->boolean('judgement')->nullable()->default(false);
            $table->integer('carton_quantity')->nullable()->default(1);
            $table->boolean('need_sir')->nullable()->default(false);
            $table->boolean('sir_available')->nullable()->default(false);
        });

        Schema::create('similarities_checking', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('pick_list_qs')->nullable();
            $table->string('shipping_invoice_qs')->nullable();
            $table->string('serem_qs')->nullable();
            $table->string('SIR_qs')->nullable();
            $table->boolean('same_quantity_qs')->nullable();
            $table->boolean('judgement_qs')->nullable();
            $table->string('picklist_bs')->nullable();
            $table->string('packing_slip_bs')->nullable();
            $table->string('serem_bs')->nullable();
            $table->string('pallet_label_bs')->nullable();
            $table->boolean('same_box_bs')->nullable();
            $table->boolean('judgement_bs')->nullable();
            $table->string('picklist_mn')->nullable();
            $table->string('shipping_invoice_mn')->nullable();
            $table->string('serem_mn')->nullable();
            $table->string('fg_label_mn')->nullable();
            $table->string('vmi_qr_mn')->nullable();
            $table->string('mc_label_mn')->nullable();
            $table->string('pallet_label_mn')->nullable();
            $table->boolean('same_model_mn')->nullable();
            $table->boolean('judgement_mn')->nullable();
            $table->string('picklist_mc')->nullable();
            $table->string('shipping_invoice_mc')->nullable();
            $table->string('serem_mc')->nullable();
            $table->string('sir_mc')->nullable();
            $table->string('shipping_label_mc')->nullable();
            $table->string('vmi_label_mc')->nullable();
            $table->string('mc_barcode_mc')->nullable();
            $table->string('pallet_label_mc')->nullable();
            $table->string('specific_qr_label_mc')->nullable();
            $table->boolean('same_mc')->nullable();
            $table->boolean('judgement_mc')->nullable();
            $table->string('picklist_pn')->nullable();
            $table->string('shipping_invoice_pn')->nullable();
            $table->string('serem_pn')->nullable();
            $table->string('sir_pn')->nullable();
            $table->string('shipping_label_pn')->nullable();
            $table->string('vmi_pn')->nullable();
            $table->boolean('same_pn')->nullable();
            $table->boolean('judgement_pn')->nullable();
            $table->string('serem_customer_po')->nullable();
            $table->string('serem_smp_po')->nullable();
            $table->string('shipping_label_customer_po')->nullable();
            $table->string('shipping_label_smp_po')->nullable();
            $table->string('vmi_customer_po')->nullable();
            $table->string('vmi_smp_po')->nullable();
            $table->string('sir_customer_po')->nullable();
            $table->string('sir_smp_po')->nullable();
            $table->string('specific_label_customer_po')->nullable();
            $table->string('specific_label_smp_po')->nullable();
            $table->string('pallet_label_customer_po')->nullable();
            $table->string('palley_label_smp_po')->nullable();
            $table->boolean('same_po')->nullable();
            $table->boolean('judgement_po')->nullable();
        });

        // Schema::create('checkingSimilarities', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('checklist_id')->constrained(
        //         table: 'checklist', indexName: 'id'
        //     )->onUpdate('cascade')->onDelete('cascade');
        //     $table->string('comparison_type');
        //     $table->json('field_values');
        //     $table->boolean('same');
        //     $table->boolean('judgement');
        //     $table->timestamps();
        // });

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
        Schema::dropIfExists('preparation_checklist');
        Schema::dropIfExists('o_b_a__kit__checklists');
        Schema::dropIfExists('shipment_information');
        Schema::dropIfExists('check_items');
        Schema::dropIfExists('similarities_checking');
    }
};
