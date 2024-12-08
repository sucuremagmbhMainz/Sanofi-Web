<?php namespace Ilume\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIlumeBackendRainlabPageRevisions extends Migration
{
    public function up()
    {
        Schema::create('ilume_backend_rainlab_page_revisions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('page_id')->unsigned();
            $table->integer('revision_id')->unsigned();
            $table->string('revision_name', 20);
            $table->integer('last_editor_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ilume_backend_rainlab_page_revisions');
    }
}
