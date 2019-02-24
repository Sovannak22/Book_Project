<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToTableStoreTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_types', function (Blueprint $table) {
            $table->string('type');
            $table->renameColumn('book_amount','amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_amount', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->renameColumn('amount','book_amount');
            
        });
    }
}
