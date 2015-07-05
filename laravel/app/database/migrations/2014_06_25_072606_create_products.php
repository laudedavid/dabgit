<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->string('prodcode', 10)->primary();
			$table->string('prodname', 60);
			$table->string('prodtype', 5);
			$table->integer('prodqty')->nullable();
			$table->float('prodprice', 5, 2)->nullable();
			$table->integer('prodrlevel')->nullable();
			$table->integer('prodrquant')->nullable();
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
