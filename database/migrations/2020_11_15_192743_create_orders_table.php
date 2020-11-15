<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('itemname');
            $table->string('itemprice');
            $table->string('itemquantity');
            $table->string('itemtotal');
            
// checkout data
            $table->string('username');
            $table->string('useremail');
            $table->string('useraddress');
            $table->string('usercountry');
            $table->string('usercity');
            $table->string('userzip');
            $table->string('usertotal');
            $table->string('paymentmethod')->default('Cash_On_Delivery');

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
        Schema::dropIfExists('orders');
    }
}
