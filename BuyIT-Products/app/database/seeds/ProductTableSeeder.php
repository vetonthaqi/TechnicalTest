<?php

class ProductTableSeeder extends Seeder
{
	public function run()
	{
		ITProduct::create(array(
			'product_name'=>'Product 1',
			'description'=>'description of Product 1',
			'quantity'=>10,
			'buying_price'=>100,
			'selling_price'=>150,
			'author_id'=>1
		));
	}
}