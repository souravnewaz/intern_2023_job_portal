<?php
use App\Models\Category;
use App\Models\Company;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('company_id');
            $table->string('title');
            $table->string('location');
            $table->integer('vacancy');
            $table->integer('experience');
            $table->enum('gender', ['male', 'female', 'any']);
            $table->enum('employment_status', ['part_time', 'full_time']);
            $table->integer('min_age');
            $table->integer('max_age');
            $table->integer('salary_starts')->nullable();
            $table->integer('salary_ends')->nullable();
            $table->date('deadline');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('jobs');
    }
};
