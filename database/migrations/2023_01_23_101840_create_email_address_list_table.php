<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAddressListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_address_list', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();
            // メールアドレスの保持者。
            $table->string('user', 255);
            // メールアドレス。
            $table->string('email', 255);

            // timestamp型は、2038年問題の懸念により、使用していない。
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_address_list');
    }
}
