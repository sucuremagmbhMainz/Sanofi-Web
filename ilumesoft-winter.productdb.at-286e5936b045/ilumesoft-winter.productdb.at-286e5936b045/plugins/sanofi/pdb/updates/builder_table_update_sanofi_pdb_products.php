<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProducts extends Migration
{
    public function up()
    {
        Schema::rename('sanofi_pdb_product', 'sanofi_pdb_products');
    }
    
    public function down()
    {
        Schema::rename('sanofi_pdb_products', 'sanofi_pdb_product');
    }
}
