<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
			$table->string('phone_mobile',100);
			$table->string('phone_extension',100);
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->boolean('subscribed')->default(true);
            $table->string('lang',2);
			$table->integer('corporate_id');
            $table->boolean('request_corporate')->default(false);
            $table->timestamps();
        });
		
		Schema::create('corporates', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
			$table->string('phone',100);
			$table->string('email',100);
			$table->text('address');
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
		
		Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('url',100);
			$table->integer('package_id');
            $table->integer('corporate_id')->unsigned();
			$table->foreign('corporate_id')
                ->references('id')->on('corporates')
                ->onDelete('cascade');
			$table->integer('addons_id');
            $table->string('purpose', 100);
            $table->string('purpose_other', 100);
            $table->string('target', 100);
            $table->string('target_other', 100);
            $table->string('targetAge', 100);
            $table->string('gender', 100);
            $table->text('providedInformation');
            $table->text('ilikeToSee');
            $table->text('expectToDo');
            $table->text('internetTime');
            $table->text('contentFrom');
            $table->text('contentUpdate');
            $table->string('static', 100);
            $table->string('static_other', 100);
            $table->string('domain', 100);
            $table->string('noDomain', 100);
            $table->string('artwork', 100);
            $table->string('color', 100);
            $table->string('websiteStyle', 100);
            $table->string('websiteStyle_other', 100);
            $table->string('device', 100);
            $table->text('effective');
            $table->text('pleasing');
            $table->string('dynamic', 100);
            $table->string('dynamic_other', 100);
            $table->string('budget', 100);
            $table->string('knowledge', 100);
            $table->string('date', 100);
            $table->text('question');
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
        Schema::drop('projects');
		Schema::drop('corporates');
        Schema::drop('password_reminders');
	}

}
