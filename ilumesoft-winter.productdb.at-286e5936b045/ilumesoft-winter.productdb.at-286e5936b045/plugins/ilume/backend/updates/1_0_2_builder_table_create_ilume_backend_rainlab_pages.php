<?php namespace Ilume\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIlumeBackendRainlabPages extends Migration
{
    public function up()
    {
        Schema::create('ilume_backend_rainlab_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('page_ref', 512);
            $table->integer('creator_id')->unsigned();
            $table->string('grant_group_access_to', 512);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('current_revision_id')->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ilume_backend_rainlab_pages');
    }
}
