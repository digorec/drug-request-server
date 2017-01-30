<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddIndexesToRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('macrobit_drugreq_requests', function ($table) {
            $table->index('request_campaign_id');
            $table->index('lpu_id');
        });
    }

    public function down()
    {
        Schema::table('macrobit_drugreq_requests', function ($table) {
            $table->dropIndex('request_campaign_id');
            $table->dropIndex('lpu_id');
        });
    }
}