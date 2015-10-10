<?php

class CakeController extends BaseController {

	//DISPLAY OF THE CAKES  
    public function order($id){
      
       $orderCake = Cake::find($id);
       $buyer = Buyer::orderBy('created_at', 'desc')->first();
       $fbID = $buyer->fbID;
       $select = Cake::where('id', '=', $id)->get(); 
       $order = new Order;

        $name = $select['name'];
        $price = $select['price'];
        $category = $select['category'];
        $description = $select['description'];
        $fbID = $fbID;
        $image=$select['image'];

        $order->name=$name;
        $order->price=$price;
        $order->category=$category;
        $order->description=$description;
        $order->buyersID=$fbID;
        $order->image=$image;

        $order->save();

       return Redirect::to('myaccountBuyer'); 

    }
    
	
  public function addCake()
  {
       return View::make('addCake');
      //return "aw";
  }  

	public function saveCake()
	{
	    // validate
        $rules = array(
            'name'    => 'required',
            'price'   => 'required',
            'category' => 'required',
            'description'   => 'required', 
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('addCake')
                ->withErrors($validator);
        } else {
        	//IMAGEUPLOAD
        	$image = Input::file('image');
			if($image) {
				$upload_folder = '/img/upload/';
				$file_name = str_random(30). '.' . $image->getClientOriginalExtension();
				$image->move(public_path() . $upload_folder, $file_name);
			}
			///

			// store
            $cake = new Cake;
            $cake->name = Input::get('name');
            $cake->price = Input::get('price');
            $cake->category = Input::get('category');
            $cake->description = Input::get('description');
            
            $seller = new Seller;

            $seller = Seller::orderBy('created_at', 'desc')->first();
            $fbId = $seller['fbId'];
            $cake->userFbId = $fbId;

           
            //IMAGEUPLOAD
            if($image) $cake->image = $file_name;
            ///////
            $cake->save();

            // redirect
            Session::flash('message', 'Successfully created Product!');
            return Redirect::to('myaccountSeller');
        }
	}
  // public function addCakeBuyer()
  // {
  //      return View::make('addCakeBuyer');
  //     //return "aw";
  // }  

  // public function saveCakeBuyer()
  // {
  //     // validate
  //       $rules = array(
  //           'name'    => 'required',
  //           'price'   => 'required',
  //           'category' => 'required',
  //           'description'   => 'required', 
  //       );
  //       $validator = Validator::make(Input::all(), $rules);

  //       // process the login
  //       if ($validator->fails()) {
  //           return Redirect::to('addCake')
  //               ->withErrors($validator);
  //       } else {
  //         //IMAGEUPLOAD
  //         $image = Input::file('image');
  //     if($image) {
  //       $upload_folder = '/img/upload/';
  //       $file_name = str_random(30). '.' . $image->getClientOriginalExtension();
  //       $image->move(public_path() . $upload_folder, $file_name);
  //     }
  //     ///

  //     // store
  //           $cake = new Cake;
  //           $cake->name = Input::get('name');
  //           $cake->price = Input::get('price');
  //           $cake->category = Input::get('category');
  //           $cake->description = Input::get('description');
            
  //           $buyer = new Buyer;

  //           $buyer = Buyer::orderBy('created_at', 'desc')->first();
  //           $fbId = $buyer['fbId'];
  //           $cake->userFbId = $fbId;

           
  //           //IMAGEUPLOAD
  //           if($image) $cake->image = $file_name;
  //           ///////
  //           $cake->save();

  //           // redirect
  //           Session::flash('message', 'Successfully created Product!');
  //           return Redirect::to('myaccountBuyer');
  //       }
  // }
    public function editCake($id)
    {
      $editCake = Cake::find($id); 
      return View::make('updateCake')->with('editCake', $editCake); 
    }

    public function updateCake()
    { 

       $inputDetails = Input::all();
         $rules = array(
            'name'    => 'required',
            'price'   => 'required',
            'category' => 'required',
            'description'   => 'required', 
        );
        $validation = Validator::make($inputDetails, $rules);
  

       if($validation->passes())  
       {
         $image = Input::file('image');
            if($image) {
                $upload_folder = '/img/upload/';
                $file_name = str_random(30). '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . $upload_folder, $file_name);
            }
            
           
           $editCake = Cake::find($id);   

           $editCake->name = $inputDetails['name'];
           $editCake->price = $inputDetails['price'];
           $editCake->category = $inputDetails['category'];
           $editCake->description = $inputDetails['description'];

            if($image) $cake->image = $file_name;
           $editCake->save();


          return Redirect::to('myaccountSeller');
        }
      else
        return Redirect::back()->withInput()->withErrors($validation);
              
    }
    
     
}

?>