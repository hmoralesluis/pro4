<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_opinions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('guest_name');
			$table->string('guest_email');
			$table->string('opinion');
			$table->integer('raiting')->nullable(); // can be used or not...
			$table->boolean('is_active')->defaul(true);
			$table->timestamps();
			$table->integer('product_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_opinions');
	}

}
