<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('surname')->after('name');
            $table->dropColumn('full_name');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->dropColumn(['name', 'surname']);
        });
    }
};
