<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTachesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taches', function(Blueprint $table)
		{
			$table->string('id_tache', 25)->primary();
			$table->string('libelle_tache', 50)->nullable();
			$table->string('description_tache')->nullable();
			$table->decimal('progression_tache', 5)->nullable();
			$table->date('DateDebut_tache')->nullable();
			$table->date('DateFin_tache')->nullable();
			$table->string('Id_objectif', 25)->index('Id_objectif');
			$table->string('Id_fic', 10)->index('Id_fic');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taches');
	}

}
