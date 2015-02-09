<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buy_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('product_name');
			$table->string('description');
			$table->integer('quantity');
			$table->integer('buying_price');
			$table->integer('selling_price');
			$table->string('picture');
			$table->integer('author_id');
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
		Schema::drop('buy_products');	
	}

}
