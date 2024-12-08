<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbIngredients extends Migration
{
    public function up()
    {
        Schema::rename('sanofi_pdb_ingriedients', 'sanofi_pdb_ingredients');
    }
    
    public function down()
    {
        Schema::rename('sanofi_pdb_ingredients', 'sanofi_pdb_ingriedients');
    }
}
