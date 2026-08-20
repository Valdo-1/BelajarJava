<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop foreign key kalau ada
        try {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['product_id']);
            });
        } catch (\Exception $e) {
            // FK gak ada, gapapa
        }

        // Drop kolom lama kalau ada
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'product_id')) {
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('orders', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });

        // Tambah kolom baru buat POS
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'order_code')) {
                $table->string('order_code')->after('id');
            }
            if (!Schema::hasColumn('orders', 'order_amount')) {
                $table->decimal('order_amount', 15, 2)->after('order_code')->default(0);
            }
            if (!Schema::hasColumn('orders', 'order_change')) {
                $table->decimal('order_change', 15, 2)->after('order_amount')->default(0);
            }
            if (!Schema::hasColumn('orders', 'status')) {
                $table->boolean('status')->default(1)->after('order_change');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['order_code', 'order_amount', 'order_change', 'status']);
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->integer('quantity');
        });
    }
};