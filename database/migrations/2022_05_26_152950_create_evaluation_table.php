<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluation', function(Blueprint $table)
		{
			$table->string('Id_Eval', 50)->primary();
			$table->date('periodedebut_eval')->nullable();
			$table->dzte('periodefin_eval')->nullable();
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
		Schema::drop('evaluation');
	}

}
