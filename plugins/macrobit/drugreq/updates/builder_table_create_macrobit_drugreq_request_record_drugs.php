<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMacrobitDrugreqRequestRecordDrugs extends Migration
{
    public function up()
    {
        Schema::create('macrobit_drugreq_request_record_drugs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('request_id')->unsigned();
            $table->string('inn', 511)->nullable();
            $table->string('form', 511)->nullable();
            $table->decimal('dose', 12, 3)->nullable();
            $table->string('unit', 511)->nullable();
            $table->decimal('count', 12, 3)->nullable();
            $table->text('additional_characteristics')->nullable();
            $table->text('note')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('macrobit_drugreq_request_record_drugs');
    }
}
