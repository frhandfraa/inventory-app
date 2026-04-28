<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia')->after('description');
        });

        // For SQLite compatibility, we'll use a different approach
        // Change price column type by recreating the table
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('price_new')->after('price');
        });

        // Copy data from old price column to new one
        DB::statement('UPDATE products SET price_new = CAST(price AS INTEGER)');

        // Drop old price column and rename new one
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('price_new', 'price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For SQLite compatibility, reverse the price column change
        Schema::table('products', function (Blueprint $table) {
            $table->integer('price_old')->after('price');
        });

        // Copy data back
        DB::statement('UPDATE products SET price_old = CAST(price AS INTEGER)');

        // Drop new price column and rename old one back
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('price_old', 'price');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['description', 'status']);
        });
    }
};
