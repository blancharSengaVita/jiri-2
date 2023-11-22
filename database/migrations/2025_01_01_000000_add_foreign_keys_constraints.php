<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jiris', static function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('contacts', static function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('attendances', static function (Blueprint $table) {
            $table->foreignId('contact_id')->constrained();
        });
        Schema::table('attendances', static function (Blueprint $table) {
            $table->foreignId('jiri_id')->constrained();
        });
        Schema::table('projects', static function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('implementations', static function (Blueprint $table) {
            $table->foreignId('project_id')->constrained();
            $table->foreignId('contact_id')->constrained();
            $table->foreignId('jiri_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jiris', static function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('contacts', static function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('attendances', static function (Blueprint $table) {
            $table->dropForeign(['contact_id']);
        });
        Schema::table('attendances', static function (Blueprint $table) {
            $table->dropForeign(['jiri_id']);
        });
        Schema::table('projects', static function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('implementations', static function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['contact_id']);
            $table->dropForeign(['jiri_id']);
        });
    }
};
