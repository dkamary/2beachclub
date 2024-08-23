<?php

use App\Models\Tracking as ModelsTracking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tracking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(ModelsTracking::TABLE_NAME);

        Schema::create(ModelsTracking::TABLE_NAME, function (Blueprint $table) {

            $table->unsignedBigInteger('id', true);

            $table->string('url', 512)
                ->index('idx_tracking_url');

            $table->string('event', 50)
                ->index('idx_tracking_event');

            $table->string('visitor_referral_url', 512)
                ->index('idx_tracking_visitor_referral')
                ->nullable();

            $table->string('visitor_ip', 50)
                ->index('idx_tracking_visitor_ip')
                ->nullable();

            $table->string('visitor_user_agent', 255)
                ->index('idx_tracking_visitor_agent')
                ->nullable();

            $table->dateTime('created_at')
                ->index('tracking_created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ModelsTracking::TABLE_NAME);
    }
}
