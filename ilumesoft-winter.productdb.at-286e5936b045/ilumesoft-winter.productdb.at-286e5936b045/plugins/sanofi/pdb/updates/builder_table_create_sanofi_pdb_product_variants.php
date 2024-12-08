<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateSanofiPdbProductVariants extends Migration
{
    public function up()
    {
        Schema::create('sanofi_pdb_product_variants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->boolean('is_active');
            $table->boolean('is_prescription_required');
            $table->boolean('is_pharmacy_required');
            $table->boolean('is_cosmetic');
            $table->boolean('is_medicine');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sanofi_pdb_product_variants');
    }
}
