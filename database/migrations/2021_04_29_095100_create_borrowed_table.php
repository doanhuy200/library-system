<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->dateTime('expired_at');
            $table->tinyInteger('status');

            $table->timestamp('created_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowed');
    }
}
