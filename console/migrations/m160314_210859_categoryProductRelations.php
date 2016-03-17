<?php

use yii\db\Schema;
use yii\db\Migration;

class m160314_210859_categoryProductRelations extends Migration
{
    public function up()
    {
        $this->createTable("{{categoryProductRelations}}", [
            "id"=>$this->primaryKey(),
            "categoryId"=>$this->integer(),
            "productId"=>$this->integer()
        ]);
    }

    public function down()
    {
        echo "m160314_210859_categoryProductRelations cannot be reverted.\n";

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
