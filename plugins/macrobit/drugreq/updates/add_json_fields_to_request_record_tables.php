<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddJsonFieldsToRequestRecordTables extends Migration
{
    public function up()
    {
        Schema::table('macrobit_drugreq_request_record_drugs', function ($table) {
            $table->jsonb('additional_fields')->nullable();
        });
        Schema::table('macrobit_drugreq_request_record_stuff', function ($table) {
            $table->jsonb('additional_fields')->nullable();
        });
    }

    public function down()
    {
        Schema::table('macrobit_drugreq_request_record_drugs', function($table) {
            $table->dropColumn('additional_fields');
        });
        Schema::table('macrobit_drugreq_request_record_stuff', function($table) {
            $table->dropColumn('additional_fields');
        });
    }
}