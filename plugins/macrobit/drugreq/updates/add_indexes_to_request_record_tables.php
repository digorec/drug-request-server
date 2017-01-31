<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddIndexesToRequestRecordTables extends Migration
{
    public function up()
    {
        Schema::table('macrobit_drugreq_request_record_drugs', function ($table) {
            $table->index('request_id');
        });
        Schema::table('macrobit_drugreq_request_record_stuff', function ($table) {
            $table->index('request_id');
        });
    }

    public function down()
    {
        Schema::table('macrobit_drugreq_request_record_drugs', function ($table) {
            $table->dropIndex('request_id');
        });
        Schema::table('macrobit_drugreq_request_record_stuff', function ($table) {
            $table->dropIndex('request_id');
        });
    }
}