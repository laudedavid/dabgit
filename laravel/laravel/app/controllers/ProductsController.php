<?php

class ProductsController extends BaseController {

	public function index()
	{	
		$products = Products::all();
		return View::make('content.list', ['products'=>$products]);
	}

	public function addItems()
	{
		return View::make('content.additems');
	}
	public function editItem($prodcode) 
	{
	  	$productInfo = Products::find($prodcode);
	  	return View::make('content.updateitems', ['product'=>$productInfo]);
	}
	public function deleteItem($prodcode)
	{
		$product = Products::find($prodcode);	
    	$product->delete();
    	return Redirect::to('products/');
	}
	public function updateItem()
	{
		$inputDetails = Input::all();

		$productCode = $inputDetails['prodcode'];

        $product = Products::find($productCode);

		$product->prodcode = $inputDetails['prodcode'];
		$product->prodname = $inputDetails['prodname'];
		$product->prodtype = $inputDetails['prodtype'];
		$product->prodqty = $inputDetails['prodqty'];
		$product->prodprice = $inputDetails['prodprice'];
		$product->prodrlevel = $inputDetails['prodrlevel'];
		$product->prodrquant = $inputDetails['prodrquant'];

		$product->save();

		return Redirect::to('products/');
	}
	public function saveItems()
	{
		$inputDetails = Input::all();

		$product = new Products;
		$product->prodcode = $inputDetails['prodcode'];
		$product->prodname = $inputDetails['prodname'];
		$product->prodtype = $inputDetails['prodtype'];
		$product->prodqty = $inputDetails['prodqty'];
		$product->prodprice = $inputDetails['prodprice'];
		$product->prodrlevel = $inputDetails['prodrlevel'];
		$product->prodrquant = $inputDetails['prodrquant'];

		$product->save();

		return Redirect::to('products/');

	}
}
