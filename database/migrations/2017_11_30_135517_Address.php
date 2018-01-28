<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Address extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('address', function (Blueprint $table) {
			$table->increments('addressId');
			$table->string('house', 200);
			$table->string('road', 200);
			$table->string('block', 10);
			$table->string('location', 300);
			$table->string('thana', 200);
			$table->string('district', 200);
			$table->string('postOffice', 200);
			$table->string('postCode', 100);
			$table->string('division', 100);

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('address');
	}
}
