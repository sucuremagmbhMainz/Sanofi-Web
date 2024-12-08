<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProductVariants2 extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->string('description', 450);
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
