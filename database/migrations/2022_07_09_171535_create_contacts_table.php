<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // bigint unsigned Primary_key
            $table->string('fullname', 255);
            // stringメソッドでvarcharカラムを作成
            $table->tinyInteger('gender');
            $table->string('email');
            // モデルでemail型のみとするValidation
            $table->char('postcode', 8);
            $table->string('address', 255);
            $table->string('building_name', 255)->nullable();
            $table->text('opinion');
            // 125文字以内の制限はモデルのValidation
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
