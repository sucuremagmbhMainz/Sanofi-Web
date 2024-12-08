<?php namespace Sanofi\Pdb\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateSanofiPdbProducts3 extends Migration
{
    public function up()
    {
        Schema::table('sanofi_pdb_products', function($table)
        {
            $table->string('description', 450)->default('0');
            $table->integer('area_id')->unsigned()->default(0);
            $table->boolean('ingredient_type');
            $table->boolean('is_active')->default(null)->change();
            $table->dropColumn('area');
            $table->dropColumn('ingridient_type');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('sanofi_pdb_products', function($table)
        {
            $table->dropColumn('description');
            $table->dropColumn('area_id');
            $table->dropColumn('ingredient_type');
            $table->boolean('is_active')->default(0)->change();
            $table->integer('area')->unsigned();
            $table->boolean('ingridient_type')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
