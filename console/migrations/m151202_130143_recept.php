<?php

use yii\db\Schema;
use yii\db\Migration;

class m151202_130143_recept extends Migration {

    public function up() {
        $this->createTable("{{%recept}}", [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'about' => Schema::TYPE_TEXT,
            'language'=>'varchar(6)  DEFAULT "ru"'
        ]);
    }

    public function down() {
        echo "m151202_130143_recept cannot be reverted.\n";

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
