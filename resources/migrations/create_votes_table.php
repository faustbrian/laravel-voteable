<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVotesTable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreateVotesTable extends Migration
{
    /**
     *
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_id')->unsigned()->index();
            $table->morphs('voteable');
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     *
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
