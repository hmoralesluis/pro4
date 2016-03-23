<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('category_id')->unsigned();

			$table->string('mark');
            $table->index('mark');

			$table->string('part_number');
			$table->index('part_number');

			$table->string('code')->nullable();
            $table->index('code');

			$table->string('image');

			$table->string('description')->nullable();
            $table->index('description');

			$table->integer('visit_count')->nullable();
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
		Schema::drop('products');
	}

}
