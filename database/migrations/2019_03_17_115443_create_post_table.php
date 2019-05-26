<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('post_title');
            $table->integer('category_id');
            $table->text('post_short_description');
            $table->text('post_long_description');
            $table->string('post_image');
            $table->string('author_name');
            $table->tinyInteger('hit_counter');
            $table->tinyInteger('publication_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('post', function (Blueprint $table) {
            //
        });
    }

}
