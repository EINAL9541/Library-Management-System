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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date');
            $table->date('return_date');
            $table->foreignId('book_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->foreignId('member_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
           
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
