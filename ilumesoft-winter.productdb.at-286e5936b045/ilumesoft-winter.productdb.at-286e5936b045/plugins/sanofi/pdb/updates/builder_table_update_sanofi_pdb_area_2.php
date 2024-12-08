<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbArea2 extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_area', function($table)
        {
            $table->string('name', 255)->default('is_')->change();
            $table->renameColumn('active', 'is_active');
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_area', function($table)
        {
            $table->string('name', 255)->default(null)->change();
            $table->renameColumn('is_active', 'active');
        });
    }
}
