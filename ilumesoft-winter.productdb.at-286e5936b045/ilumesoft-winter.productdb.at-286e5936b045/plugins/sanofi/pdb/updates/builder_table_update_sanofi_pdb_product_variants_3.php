<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProductVariants3 extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->integer('sort_order')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
