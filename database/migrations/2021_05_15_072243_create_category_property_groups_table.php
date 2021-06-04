<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPropertyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_property_groups', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('property_groups_id')->constrained();
            $table->primary(['category_id','property_groups_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_property_groups');
    }
}
