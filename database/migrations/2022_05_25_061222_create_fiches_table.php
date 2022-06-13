<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFichesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fiches', function(Blueprint $table)
		{
			$table->string('id_fic', 10)->primary();
			$table->string('nom_fic', 50)->nullable();
			$table->date('DateDebut_fic')->nullable();
			$table->date('DateFin_fic')->nullable();
			$table->integer('id')->index('id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fiches');
	}

}
