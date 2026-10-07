<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('pages', 'password')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('password')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pages', 'password')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('password');
            });
        }
    }
};
