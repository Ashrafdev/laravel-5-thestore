<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->char('id', 36);
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
            $table->text('file_name')->nullable();
            $table->string('img_path')->nullable();
            $table->string('file_mime')->nullable();
            $table->integer('item_categories_id')->nullable();
            $table->char('user_id', '36')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->primary('id');
            $table->index(['item_categories_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
