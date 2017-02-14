<?php namespace Macrobit\Drugreq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddLpuIdToBackendUsersTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('backend_users', 'lpu_id')) {
            return;
        }

        Schema::table('backend_users', function ($table) {
            $table->integer('lpu_id')->unsigned()->nullable()->index();
        });
    }

    public function down()
    {
        if (Schema::hasTable('backend_users')) {
            Schema::table('backend_users', function ($table) {
                $table->dropColumn('lpu_id');
            });
        }
    }
}