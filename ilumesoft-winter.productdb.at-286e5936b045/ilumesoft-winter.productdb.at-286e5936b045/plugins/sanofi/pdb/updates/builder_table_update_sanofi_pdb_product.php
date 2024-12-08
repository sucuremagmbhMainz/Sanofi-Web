<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProduct extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_product', function($table)
        {
            $table->renameColumn('active', 'is_active');
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_product', function($table)
        {
            $table->renameColumn('is_active', 'active');
        });
    }
}
