<?php
use yii\db\Schema;
use yii\db\Migration;

class m160313_192140_category extends Migration
{

    public function up()
    {
        $sql = "CREATE TABLE category (
        id            INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
        root          INT(11)               DEFAULT NULL,
        lft           INT(11)      NOT NULL,
        rgt           INT(11)      NOT NULL,
        lvl           SMALLINT(5)  NOT NULL,
        name          VARCHAR(60)  NOT NULL,
        icon          VARCHAR(255)          DEFAULT NULL,
        icon_type     TINYINT(1)   NOT NULL DEFAULT '1',
        active        TINYINT(1)   NOT NULL DEFAULT TRUE,
        selected      TINYINT(1)   NOT NULL DEFAULT FALSE,
        disabled      TINYINT(1)   NOT NULL DEFAULT FALSE,
        readonly      TINYINT(1)   NOT NULL DEFAULT FALSE,
        visible       TINYINT(1)   NOT NULL DEFAULT TRUE,
        collapsed     TINYINT(1)   NOT NULL DEFAULT FALSE,
        movable_u     TINYINT(1)   NOT NULL DEFAULT TRUE,
        movable_d     TINYINT(1)   NOT NULL DEFAULT TRUE,
        movable_l     TINYINT(1)   NOT NULL DEFAULT TRUE,
        movable_r     TINYINT(1)   NOT NULL DEFAULT TRUE,
        removable     TINYINT(1)   NOT NULL DEFAULT TRUE,
        removable_all TINYINT(1)   NOT NULL DEFAULT FALSE,
        KEY tbl_product_NK1 (root),
        KEY tbl_product_NK2 (lft),
        KEY tbl_product_NK3 (rgt),
        KEY tbl_product_NK4 (lvl),
        KEY tbl_product_NK5 (active)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;";
        
        \Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        echo "m160313_192140_category cannot be reverted.\n";

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
