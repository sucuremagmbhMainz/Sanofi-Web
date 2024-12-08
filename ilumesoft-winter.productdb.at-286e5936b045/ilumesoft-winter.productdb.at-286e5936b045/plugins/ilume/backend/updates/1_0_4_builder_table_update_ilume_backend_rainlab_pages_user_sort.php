<?php namespace Ilume\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIlumeBackendRainlabUserSort extends Migration
{
    public function up()
    {
        Schema::create('ilume_backend_rainlab_pages_user_sort', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('user_id')->unsigned();
            $table->string('revision_name', 10000);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ilume_backend_rainlab_page_revisions');
    }
}
