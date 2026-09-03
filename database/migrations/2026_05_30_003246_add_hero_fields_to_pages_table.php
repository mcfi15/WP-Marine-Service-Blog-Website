<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('hero_heading')->nullable()->after('content');
            $table->text('hero_subheading')->nullable()->after('hero_heading');
            $table->string('hero_image')->nullable()->after('hero_subheading');
            $table->longText('sections')->nullable()->after('hero_image');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['hero_heading', 'hero_subheading', 'hero_image', 'sections']);
        });
    }
};
