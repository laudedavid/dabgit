<?php

Route::get('home', 'ProductsController@index');

Route::get('addimage', 'ProductsController@addImage');

Route::post('upload', 'ProductsController@upload');

// Route::get('products/create', 'ProductsController@addItems');

// Route::post('products/add', 'ProductsController@saveItems');

// Route::get('products/edit/{prodcode}', 'ProductsController@editItem');

// Route::post('products/update', 'ProductsController@updateItem');

// Route::get('products/delete/{prodcode}','ProductsController@deleteItem');



?>
