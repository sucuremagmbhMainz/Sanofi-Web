<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbLiveProducts extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_live_products', function($table)
        {
            $table->text('description')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_live_products', function($table)
        {
            $table->string('description', 450)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
