<?php

use yii\db\Migration;

/**
 * Class m231213_145644_alter_table_user_add_column_is_change_password
 */
class m231213_145644_alter_table_user_add_column_is_change_password extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'is_change_password', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'is_change_password');
        echo "m231213_145644_alter_table_user_add_column_is_change_password cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231213_145644_alter_table_user_add_column_is_change_password cannot be reverted.\n";

        return false;
    }
    */
}
