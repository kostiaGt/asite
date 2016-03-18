<?php

use yii\db\Schema;
use yii\db\Migration;

class m160318_061554_orders extends Migration
{
    public function up()
    {
        $this->createTable("{{orders}}", [
            "id"=>$this->primaryKey(),
            "code"=>$this->string(255),
            "user_id"=>$this->integer(),
            "status"=>$this->smallInteger(),
            "summ"=>$this->double(),
            "length"=>$this->smallInteger(),
            "created_at"=>$this->dateTime(),
            "updated_at"=>$this->dateTime()
        ]);
    }

    public function down()
    {
        echo "m160318_061554_orders cannot be reverted.\n";

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
