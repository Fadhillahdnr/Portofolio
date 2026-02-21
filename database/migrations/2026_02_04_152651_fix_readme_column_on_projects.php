<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // pindahkan data dari readme → readme_path
            DB::statement("UPDATE projects SET readme_path = readme WHERE readme_path IS NULL");

            $table->dropColumn('readme');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('readme')->nullable();
        });
    }
};
