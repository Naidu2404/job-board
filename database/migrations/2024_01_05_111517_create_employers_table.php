<?php

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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            //adding the name of the company
            $table->string('company_name');

            //each company is owned by a user
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained();

            $table->timestamps();
        });


        //changing the schema of the jobs table to accomodate a foreign key for the employer
        Schema::table('jobs', function (Blueprint $table) {

            $table->foreignIdFor(\App\Models\Employer::class)->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //before dropping the employer table we need to drop all the foreign key values present in the jobs table
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Employer::class);
        });

        Schema::dropIfExists('employers');
    }
};
