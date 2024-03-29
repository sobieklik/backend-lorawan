<?php

use App\Models\EndNode;
use App\Models\Gateway;
use App\Models\HistoricalData;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downlinks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EndNode::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Gateway::class)->constrained()->cascadeOnDelete();
            $table->enum('type', HistoricalData::TYPES);
            $table->text('data');
            $table->float('freq',8,3);
            $table->string('modu');
            $table->string('datr');
            $table->string('codr');
            $table->unsignedBigInteger('tmst');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downlinks');
    }
};
