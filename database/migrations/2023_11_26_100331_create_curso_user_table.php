<?php

use App\Enumeration\CursoUserRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('curso_user', function (Blueprint $table) {
            $table->uuid('curso_id');
            $table->foreign('curso_id')
                ->references('id')->on('users');

            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->string('role')->default(CursoUserRoles::NORMAL->value);
            $table->boolean('approved')->default(0);
            $table->timestamps();

            $table->primary(['curso_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_user');
    }
};
