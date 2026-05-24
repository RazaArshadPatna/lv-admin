<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('statics', function (Blueprint $table) {
            $table->string('heading')->after('id');
            $table->string('image')->nullable()->after('heading');
            $table->text('details')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('statics', function (Blueprint $table) {
            $table->dropColumn(['heading', 'image', 'details']);
        });
    }
};
