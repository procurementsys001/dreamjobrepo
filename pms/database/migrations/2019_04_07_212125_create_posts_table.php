<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quotationTitle');
            $table->string('createdBy');
            $table->string('refNo1');
            $table->string('supplier1');
            $table->string('quoteState1');
            $table->string('filePath1');
            $table->string('refNo2');
            $table->string('supplier2');
            $table->string('quoteState2');
            $table->string('filePath2');
            $table->string('refNo3');
            $table->string('supplier3');
            $table->string('quoteState3');
            $table->string('filePath3');
            $table->boolean('processed');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
