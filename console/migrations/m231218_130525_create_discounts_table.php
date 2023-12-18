<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discounts}}`.
 */
class m231218_130525_create_discounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discounts}}', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer()->notNull(),
            'discount_percentage' => $this->integer()->notNull(),
        ]);

        $this->createIndex('IDX-PackageId-discounts', '{{%discounts}}', 'package_id');
        $this->addForeignKey('FK-discounts-discounts', '{{%discounts}}', 'package_id', '{{%packages}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-discounts-discounts', '{{%discounts}}');
        $this->dropIndex('IDX-PackageId-discounts', '{{%discounts}}');
        $this->dropTable('{{%discounts}}');
    }
}
