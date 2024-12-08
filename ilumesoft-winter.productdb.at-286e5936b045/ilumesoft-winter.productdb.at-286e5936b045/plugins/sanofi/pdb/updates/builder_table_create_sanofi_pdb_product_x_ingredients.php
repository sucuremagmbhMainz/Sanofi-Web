<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateSanofiPdbProductXIngredients extends Migration
{
    public function up()
    {
        Schema::create('sanofi_pdb_product_x_ingredients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sanofi_pdb_product_x_ingredients');
    }
}
