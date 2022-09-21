<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('app_form')->nullable();
                $table->integer('kyc_form')->nullable();
                $table->integer('enrollment_list')->nullable();
                $table->integer('signed_proposal')->nullable();
                $table->integer('sec_reg')->nullable();
                $table->integer('articles_incorp')->nullable();
                $table->integer('by_laws')->nullable();
                $table->integer('corp_sec')->nullable();
                $table->integer('cert_list')->nullable();
                $table->integer('valid_id')->nullable();
                $table->integer('statement')->nullable();
                $table->string('policy')->nullable();
                $table->string('sub_group')->nullable();
                $table->string('top_req')->nullable();  //no column
                $table->string('broker')->nullable();
                $table->string('sales_group')->nullable();
                $table->string('etcv')->nullable();
                $table->string('category')->nullable();  //no column
                $table->string('status')->nullable();   //no column
                $table->string('d_sub')->nullable();    //no column
                $table->string('lsub_doc')->nullable();  //no column
                $table->string('pol_incept')->nullable();
                $table->string('ef_date')->nullable();
                $table->string('exp_date')->nullable();
                $table->string('prog_type')->nullable();
                $table->string('month')->nullable();    //no column
                $table->string('modal_billing')->nullable();
                $table->string('ar_officer')->nullable();
                $table->string('remarks')->nullable();
                $table->string('sale_g')->nullable();     //no column
                $table->string('branch')->nullable();
                $table->string('reg_date')->nullable();
                $table->string('place_reg')->nullable();
                $table->string('id_sub')->nullable();
                $table->string('id_num')->nullable();
                $table->string('tel_no')->nullable();
                $table->string('n_business')->nullable();
                $table->string('place')->nullable();
                $table->string('district')->nullable();
                $table->string('prov')->nullable();
                $table->string('rem')->nullable();
                
 
                

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};