<?php

use yii\db\Schema;
use yii\db\Migration;

class m160628_080651_products extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            'products',
            [
                'id' => Schema::TYPE_BIGPK,
                'name' => Schema::TYPE_BIGINT . ' NOT NULL',
                'description' => Schema::TYPE_TEXT . ' DEFAULT NULL',
                'price' => Schema::TYPE_FLOAT . ' DEFAULT 0.0',
            ],
            $tableOptions);
        $this->batchInsert('products', ['name', 'description', 'price'], [
            ["Product #1", 'Description for product #1', 1.0],
            ["Product #2", 'Description for product #2', 20.0],
            ["Product #3", 'Description for product #3', 15.0],
        ]);
    }

    public function down()
    {
        $this->dropTable('products');
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
