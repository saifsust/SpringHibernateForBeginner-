<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultShowcase extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('result_showcase', function (Blueprint $table) {
			$table->increments('resultShowcaseId');
			$table->string('session', 10);
			$table->string('examName', 200);
			$table->string('resultTableName', 200);
			$table->date('uploadedDate');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('result_showcase');
	}
}
