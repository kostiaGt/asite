<?php

use yii\db\Schema;
use yii\db\Migration;

class m160318_061602_orders_products extends Migration
{
    public function up()
    {
        $this->createTable("{{orders_products}}", [
            "id"=>$this->primaryKey(),
            "order_id"=>$this->integer(),
            "user_id"=>$this->integer(),
            "product_id"=>$this->integer(),
            "product_code"=>$this->string(255),
            "product_name"=>$this->string(255),
            "product_url"=>$this->string(255),
            "product_image"=>$this->string(255),            
            "status"=>$this->smallInteger(),
            "price"=>$this->double(),
            "summ"=>$this->double(),
            "length"=>$this->smallInteger(),
            "created_at"=>$this->dateTime(),
            "updated_at"=>$this->dateTime()
        ]);
    }

    public function down()
    {
        echo "m160318_061602_orders_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
