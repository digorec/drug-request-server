<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddStuffIdToRequestRecordStuffTable extends Migration
{
    public function up()
    {
        Schema::table('macrobit_drugreq_request_record_stuff', function($table) {
            $table->bigInteger('stuff_id')->nullable()->unsigned()->index();
        });
    }

    public function down()
    {
        Schema::table('macrobit_drugreq_request_record_stuff', function($table)
        {
            $table->dropColumn('stuff_id');
        });
    }
}