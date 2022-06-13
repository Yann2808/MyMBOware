<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObjectifsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('objectifs', function(Blueprint $table)
		{
			$table->string('Id_objectif', 25)->primary();
			$table->string('Libelle_objectif', 50)->nullable();
			$table->date('DeadLine')->nullable();
			$table->string('Code_dep', 15)->index('Code_dep');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('objectifs');
	}

}
