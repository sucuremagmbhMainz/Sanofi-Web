<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateSanofiPdbProduct extends Migration
{
    public function up()
    {
        Schema::create('sanofi_pdb_product', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->boolean('active')->default(0);
            $table->integer('area')->unsigned();
            $table->boolean('ingridient_type')->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sanofi_pdb_product');
    }
}
