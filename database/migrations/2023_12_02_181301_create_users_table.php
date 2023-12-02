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
        /*
        Cette fonction ne doit pas contenir de token _emember, pour coller avec une envie de sécurité du client, un utilisateur qui se
        déconnecte devra donc se reconnecter.
        */


        /*
        Utilisation du ->nullable() sur la colonne "user_role" pour indiquer que celle-ci peut avoir une valeur nulle tant que les relations avec les rôles ne sont pas encore définies. Dans un souci d’optimisation, n’ayant que cinq rôles utilisateurs de prévu, j’utilise un tinyInteger. De plus j’utilise l’unsigned pour n’avoir que des valeurs positives.
        */

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_username')->unique();
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->tinyInteger('user_role')->unsigned()->nullable();
            $table->string('user_avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
