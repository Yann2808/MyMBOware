<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail', function(Blueprint $table)
		{
			$table->foreignid('Id_Eval', 50);
			$table->foreignid('Id_Comp', 50)->index('Id_Comp');
			$table->string('note', 50)->nullable();
			$table->primary(['Id_Eval','Id_Comp']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('detail');
	}

}
