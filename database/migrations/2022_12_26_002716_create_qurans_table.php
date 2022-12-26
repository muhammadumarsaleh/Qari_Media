<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qurans', function (Blueprint $table) {
            $table->id();
            $table->enum('city', ['Mekkah', 'Madinah']);
            $table->integer('juz');
            $table->integer('pages');
            $table->string('surahName', 32)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('surahLatinName', 32);
            $table->integer('verse');
            $table->boolean('includeBismillah')->default(false);
            $table->text('content')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('contentTranslation');
            $table->text('audioUrl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qurans');
    }
};
