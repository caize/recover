<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $this->down();
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('字段名称');
            $table->string('code')->unique()->default('')->comment('字段代码');
            $table->string('type')->default('')->comment('字段类型');
            $table->text('intro')->comment('文章简介');
            $table->tinyInteger('sort')->default(0)->comment('字段排序');
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
        Schema::drop('configs');
    }
}
