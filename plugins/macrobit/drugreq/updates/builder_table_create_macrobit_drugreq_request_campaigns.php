<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMacrobitDrugreqRequestCampaigns extends Migration
{
    public function up()
    {
        Schema::create('macrobit_drugreq_request_campaigns', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 511);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('macrobit_drugreq_request_campaigns');
    }
}
