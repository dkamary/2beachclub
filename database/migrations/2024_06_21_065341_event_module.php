<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Event::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedInteger('id', true);

            $table->string('title', 255)
                ->index('idx_event_title');

            $table->string('slug', 255)
                ->unique('u_event_slug');

            $table->string('subtitle', 255)
                ->index('idx_event_subtitle')
                ->nullable();

            $table->text('content')
                ->fulltext('ft_index_content')
                ->nullable();

            $table->string('preview_text', 512)
                ->index('idx_event_preview_text');

            $table->string('preview_image', 255)
                ->nullable();

            $table->string('header_image', 255)
                ->nullable();

            $table->string('book_link', 255)
                ->nullable();

            $table->string('menu_link', 255)
                ->nullable();

            $table->time('opening_time')
                ->nullable();

            $table->time('closing_time')
                ->nullable();

            $table->dateTime('validity_start')
                ->nullable();

            $table->dateTime('validity_end')
                ->nullable();

            $table->boolean('is_active')
                ->nullable()
                ->default(true);

            $table->dateTime('created_at')
                ->index('idx_event_created_at')
                ->nullable();

            $table->dateTime('updated_at')
                ->index('idx_event_updated_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Event::TABLE_NAME);
    }
}
