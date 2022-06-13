<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departement', function(Blueprint $table)
		{
			$table->string('Code_dep', 15)->primary();
			$table->string('Nom_dep', 100)->nullable();
			$table->string('Code_dir', 25)->index('Code_dir');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departement');
	}

}
