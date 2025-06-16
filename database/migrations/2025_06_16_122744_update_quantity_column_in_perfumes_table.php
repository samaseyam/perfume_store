<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('perfumes', function (Blueprint $table) {
            $table->integer('quantity')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('perfumes', function (Blueprint $table) {
            $table->integer('quantity')->default(null)->change();
        });
    }
};
