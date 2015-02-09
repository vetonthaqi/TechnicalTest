<?php

class ProductController extends BaseController
{
	public function index()
	{
		$products = ITProduct::all();
		return View::make('product.index')->with('products', $products);
	}

	public function storeProduct()
	{
		$validator = Validator::make(Input::all(), array(
			'product_name' => 'required|unique:buy_products',
			'description' => 'required|unique:buy_products',
			'quantity' => 'required|unique:buy_products',
			'buying_price' => 'required|unique:buy_products',
			'selling_price' => 'required|unique:buy_products'
		));

		if($validator->fails())
		{
			return Redirect::route('product-home')->withInput()->withErrors($validator)->with('modal', '#product_form');
		}
		else
		{
			$product = new ITProduct;
			$product->product_name = Input::get('product_name');
			$product->description = Input::get('description');
			$product->quantity = Input::get('quantity');
			$product->buying_price = Input::get('buying_price');
			$product->selling_price = Input::get('selling_price');
			$product->author_id = Auth::user()->id;

			if($product->save())
			{
				return Redirect::route('product-home')->with('success', 'The product was created.');
			}
			else
			{
				return Redirect::route('product-home')->with('fail', 'An error occured while saving the new product.');
			}
		}
	}

	public function deleteProduct($id)
	{
		$product = ITProduct::find($id);
		if($product == null)
		{
			return Redirect::route('product-home')->with('fail', 'That product doesn\'t exists.');
		}

		$delProduct = $product->delete();

		if($delProduct)
		{
			return Redirect::route('product-home')->with('success', 'The product was deleted.');
		}
		else
		{
			return Redirect::route('product-home')->with('fail', 'An error occured while deleting the group.');
		}
	}
}