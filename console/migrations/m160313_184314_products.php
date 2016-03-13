<?php

use yii\db\Schema;
use yii\db\Migration;

class m160313_184314_products extends Migration
{
    public function up()
    {
        $this->createTable("{{products}}", [
            "id" => $this->primaryKey(),
            "name" => $this->string(255),
            "searchname" => $this->string(255),
            "url" => $this->string(255),
            "name" => $this->string(255),
            "code" => $this->string(255),
            "price" => $this->double(),
            "length" => $this->integer(),
            "status" => $this->smallInteger(), 
            "created_at" => $this->dateTime(),
            "updated_at" => $this->dateTime(),
            "deleted_at" => $this->dateTime(),
            
        ]);
    }

    public function down()
    {
        echo "m160313_184314_products cannot be reverted.\n";

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
