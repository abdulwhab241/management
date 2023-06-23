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
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('type');
            $table->longText('fee_invoice')->nullable();
            $table->longText('receipt')->nullable();
            $table->longText('payment')->nullable();
            $table->longText('processing')->nullable();

            
            $table->decimal('Debit_feeInvoice',50,2)->nullable(); // Debit
            
            $table->decimal('Debit_payment',50,2)->nullable(); // Debit

            $table->decimal('credit_receipt',50,2)->nullable(); // Credit

            $table->decimal('credit_processing',50,2)->nullable(); // Credit
            
            $table->integer('year');
            $table->string('create_by')->nullable();
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_accounts');
    }
};
