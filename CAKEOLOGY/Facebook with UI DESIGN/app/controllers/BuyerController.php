<?php

class BuyerController extends BaseController {


	public function buyer()
	{

		return View::make('homeBuyer');
	}

	public function buyerStore()
	{
		$select = User::orderBy('created_at', 'desc')->first();

		$buyer = new Buyer;
		
		$name = $select['name'];
		$fbId = $select['fbId'];
		$email = $select['email'];
		$image = $select['image'];

		$buyer->name = $name;
		$buyer->fbId = $fbId;
		$buyer->email = $email;
		$buyer->image = $image;

		$buyer->save();
		return Redirect::to('homeBuyer');
		
	}
	public function listOfBuyerOrderCakes()
    {
        //  $buyer = Buyer::orderBy('created_at', 'desc')->first();
        //  $name = $buyer->name; 

        // $order = Order::where('buyersName', '=', $name)->get(); 
        // $cakes = Cake::all();
        //$order = DB::SELECT(DB::RAW("SELECT * FROM order"));
        $orders = Order::all();
        // var_dump($order);
        return View::make('myaccountBuyer', ['orders'=>$orders]);
    }
    public function listOfBuyerCakes()
    {
        $cakes = Cake::all(); 
        return View::make('productsBuyer', ['cakes'=>$cakes]);
    }
    public function listOfSellers(){
    	$seller = Seller::all();
    	return View::make('singlepageSeller',['seller'=>$seller]);
    }
}
