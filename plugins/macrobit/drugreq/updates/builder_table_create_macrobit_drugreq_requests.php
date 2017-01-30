<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMacrobitDrugreqRequests extends Migration
{
    public function up()
    {
        Schema::create('macrobit_drugreq_requests', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('request_campaign_id')->unsigned();
            $table->bigInteger('lpu_id')->unsigned();
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('macrobit_drugreq_requests');
    }
}
