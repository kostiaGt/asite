<?php

use yii\db\Schema;
use yii\db\Migration;

class m151202_132554_viewLog extends Migration {

    public function up() {
        $this->createTable("{{%viewLog}}", [
            'id' => Schema::TYPE_PK,
            'table'=>Schema::TYPE_STRING,
            'userId'=>Schema::TYPE_SMALLINT,
            'createdAt'=>Schema::TYPE_DATETIME,
            'updatedAt'=>Schema::TYPE_DATETIME,
            'deletedAt'=>Schema::TYPE_DATETIME,
        ]);
    }

    public function down() {
        echo "m151202_132554_viewLog cannot be reverted.\n";

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
