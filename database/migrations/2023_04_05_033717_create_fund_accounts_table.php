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
            $table->longText('fee_invoice')->nullable();
            $table->longText('receipt')->nullable();
            $table->longText('payment')->nullable();
            $table->longText('processing')->nullable();
            // $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade');
            // $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->onDelete('cascade');
            // $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fee_invoices')->onDelete('cascade');               
            // $table->foreignId('processing_id')->nullable()->references('id')->on('processing_fees')->onDelete('cascade');
            
            $table->decimal('Debit_feeInvoice',50,2)->nullable(); // Debit
            // $table->decimal('credit_feeInvoice',50,2)->nullable();
            
            $table->decimal('Debit_payment',50,2)->nullable(); // Debit
            // $table->decimal('credit_payment',50,2)->nullable();

            // $table->decimal('Debit_receipt',50,2)->nullable();
            $table->decimal('credit_receipt',50,2)->nullable(); // Credit

            // $table->decimal('Debit_processing',50,2)->nullable();
            $table->decimal('credit_processing',50,2)->nullable(); // Credit
            
            // $table->string('description');

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
