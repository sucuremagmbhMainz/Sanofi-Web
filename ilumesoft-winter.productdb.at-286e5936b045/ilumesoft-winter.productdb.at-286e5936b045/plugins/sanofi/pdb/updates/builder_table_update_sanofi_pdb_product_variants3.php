<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProductVariants3 extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->text('description')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_product_variants', function($table)
        {
            $table->string('description', 450)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}