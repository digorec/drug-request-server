<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMacrobitDrugreqStuff extends Migration
{
    public function up()
    {
        Schema::create('macrobit_drugreq_stuff', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 511)->nullable();
            $table->text('characteristics')->nullable();
            $table->string('unit', 511)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('macrobit_drugreq_stuff');
    }
}
