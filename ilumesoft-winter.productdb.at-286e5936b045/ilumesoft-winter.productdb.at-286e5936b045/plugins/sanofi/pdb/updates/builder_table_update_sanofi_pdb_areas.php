<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbAreas extends Migration
{
    public function up()
    {
        Schema::rename('sanofi_pdb_area', 'sanofi_pdb_areas');
    }
    
    public function down()
    {
        Schema::rename('sanofi_pdb_areas', 'sanofi_pdb_area');
    }
}
