<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Event::TABLE_NAME, function(Blueprint $table) {

            $table->string('opening_days', 255)
                ->index('idx_event_opening_days')
                ->nullable()
                ->after('menu_link');

            $table->string('preview_image_thumb', 255)
                ->nullable()
                ->after('header_image');

            $table->string('content_image', 255)
                ->nullable()
                ->after('content');

            $table->string('content_image_thumb', 255)
                ->nullable()
                ->after('content_image');

            $table->tinyInteger('rank', false, true)
                ->nullable()
                ->default(255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Event::TABLE_NAME, function(Blueprint $table) {

            $table->dropColumn('opening_days');

            $table->dropColumn('preview_image_thumb');

            $table->dropColumn('content_image');

            $table->dropColumn('content_image_thumb');

            $table->dropColumn('rank');

        });
    }
}
