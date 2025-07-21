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
            $table->unsignedBigInteger('id', false)->primary()->onDelete('cascade');
            $table->string('status')->default('Open');
            $table->string('auditor')->default('');
            $table->string('model');
            $table->string('section');
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
            $table->string('pallet_size')->nullable()->default("");
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
            $table->string('sir_qs')->nullable();
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
            $table->string('package_mc')->nullable();
            $table->boolean('same_mc')->nullable();
            $table->boolean('judgement_mc')->nullable();
            $table->string('picklist_pn')->nullable();
            $table->string('shipping_invoice_pn')->nullable();
            $table->string('serem_pn')->nullable();
            $table->string('sir_pn')->nullable();
            $table->string('shipping_label_pn')->nullable();
            $table->string('vmi_pn')->nullable();
            $table->string('package_pn')->nullable();
            $table->string('qr_qa_pn')->nullable();
            $table->string('qr_mgtz_pn')->nullable();
            $table->string('qr_mc_pn')->nullable();
            $table->string('pallet_label_pn')->nullable();
            $table->string('sci_label_pn')->nullable();
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
            $table->string('pallet_label_smp_po')->nullable();
            $table->boolean('same_po')->nullable();
            $table->boolean('judgement_po')->nullable();
        });

        Schema::create('check_overall', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')->unique();
            $table->foreign('checklist_id')->references('id')->on('checklist')->onUpdate('cascade')->onDelete('cascade');
            $table->date('expiration_date')->nullable();
            $table->string('results')->nullable();
        });

        Schema::create('check_overall_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('check_overall_id')->references('id')->on('check_overall')->onDelete('cascade');
            $table->integer('item_index'); // 1 to 10
            $table->string("oqa")->nullable();
            $table->integer("box_no")->nullable();
            $table->string("std_pack")->nullable();
            $table->boolean("internal_fg_label")->nullable();
            $table->boolean("internal_specific_label")->nullable();
            $table->boolean("internal_carton_condition")->nullable();
            $table->boolean("internal_magnet_pack")->nullable();
            $table->boolean("internal_magnet_cond")->nullable();
            $table->boolean("internal_dessicant")->nullable();
            $table->boolean("internal_pack_orientation")->nullable();
            $table->string("internal_spacer")->nullable();
            $table->boolean("internal_sir")->nullable();
            $table->boolean("external_serem")->nullable();
            $table->boolean("external_ship_label")->nullable();
            $table->boolean("external_vmi_label")->nullable();
            $table->boolean("external_mc_label")->nullable();
            $table->boolean("external_delivery_sheet")->nullable();
            $table->boolean("external_specific_label")->nullable();
            $table->boolean("external_flux_label")->nullable();
            $table->string("identity_tape")->nullable();
            $table->string("pick_list")->nullable();
            $table->string("remarks")->nullable();
        });

        Schema::create('check_overall_pallets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('check_overall_id')->references('id')->on('check_overall')->onDelete('cascade');
            $table->integer('pallet_index'); // 1 to 20
            $table->boolean('value')->nullable();
        });

        Schema::create('personnel', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('checklist_id')
                ->unique();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('shipping_pic')->nullable();
            $table->date('date')->nullable();
            $table->string('oba_checked_by')->nullable();
            $table->boolean('check_judgement')->nullable();
            $table->string('oba_picture_by')->nullable();
            $table->boolean('picture_judgement')->nullable();
        });

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
        Schema::dropIfExists('check_overall');
        Schema::dropIfExists('personnel');
    }
};
