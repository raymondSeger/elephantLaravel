<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableForPortfolio extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('portfolios', function(Blueprint $table)
        {
            $table->increments('id');
            $table->Text('url')->nullable();
            $table->Text('picture')->nullable();
            $table->Text('name')->nullable();
            $table->Text('testimony')->nullable();
            $table->Text('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('portfolios');
    }

}
