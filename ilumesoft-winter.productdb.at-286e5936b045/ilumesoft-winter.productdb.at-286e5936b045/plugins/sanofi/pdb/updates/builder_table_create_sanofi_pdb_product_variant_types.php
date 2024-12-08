<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateSanofiPdbProductVariantTypes extends Migration
{
    public function up()
    {
        Schema::create('sanofi_pdb_product_variant_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('package_size')->unsigned();
            $table->string('pzn', 100);
            $table->decimal('price', 10, 0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sanofi_pdb_product_variant_types');
    }
}
