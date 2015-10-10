<?php

class SellerController extends BaseController {


	public function seller()
	{
		return View::make('homeSeller');
	}

	public function sellerStore()
	{
		$select = User::orderBy('created_at', 'desc')->first();

		$seller = new Seller;
	
		$name = $select['name'];
		$fbId = $select['fbId'];
		$email = $select['email'];
		$image = $select['image'];

		$seller->name = $name;
		$seller->fbId = $fbId;
		$seller->email = $email;
		$seller->image = $image;


		$seller->save();
		return Redirect::to('homeSeller');
		
	}
	public function listOfSellerCreationCakes()
	{
	     $seller = Seller::orderBy('created_at', 'desc')->first();
         $fbId = $seller['fbId'];
            
        $cakes = Cake::where('userFbId', '=', $fbId)->get(); 
        return View::make('myaccountSeller', ['cakes'=>$cakes]);
	}
	public function listOfSellerCakes()
    {
        $cakes = Cake::all(); 
        return View::make('productsSeller', ['cakes'=>$cakes]);
    }
    
}
