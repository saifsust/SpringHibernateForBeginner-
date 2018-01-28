<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('personalinformation', function (Blueprint $table) {
			$table->increments('personalId');
			$table->string('firstName');
			$table->string('middleName');
			$table->string('lastName');
			$table->integer('permanentAddressId')->ussigned();
			$table->integer('presentAddressId')->unsigned();
			$table->integer('categoryId')->unsigned();
			$table->foreign('permanentAddressId')->on('address');
			$table->foreign('presentAddressId')->on('address');
			$table->foreign('categoryId')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('personalinformation');
	}
}
