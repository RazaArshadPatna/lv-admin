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
    Schema::table('static', function (Blueprint $table) {
        $table->string('heading')->after('id');
        $table->string('image')->nullable()->after('heading');
        $table->text('details')->nullable()->after('image');
    });
}

public function down(): void
{
    Schema::table('static', function (Blueprint $table) {
        $table->dropColumn(['heading', 'image', 'details']);
    });
}

};
