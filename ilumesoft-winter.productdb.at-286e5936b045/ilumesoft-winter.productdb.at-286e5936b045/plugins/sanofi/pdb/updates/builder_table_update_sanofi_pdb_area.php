<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbArea extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_area', function($table)
        {
            $table->renameColumn('title', 'name');
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_area', function($table)
        {
            $table->renameColumn('name', 'title');
        });
    }
}
