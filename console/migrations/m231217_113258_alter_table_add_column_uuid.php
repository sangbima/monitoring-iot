<?php

use yii\db\Migration;

/**
 * Class m231217_113258_alter_table_add_column_uuid
 */
class m231217_113258_alter_table_add_column_uuid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        $this->addColumn('{{%user}}', 'uuid', $this->string(36)->unique());
        $this->addColumn('{{%user_admin}}', 'uuid', $this->string(36)->unique());

        $this->update('{{%user}}', ['uuid' => new \yii\db\Expression('uuid_generate_v4()')]);
        $this->update('{{%user_admin}}', ['uuid' => new \yii\db\Expression('uuid_generate_v4()')]);

        $this->alterColumn('{{%user}}', 'uuid', 'SET NOT NULL');
        $this->alterColumn('{{%user_admin}}', 'uuid', 'SET NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'uuid');
        $this->dropColumn('{{%user_admin}}', 'uuid');
        $this->execute('DROP EXTENSION IF EXISTS "uuid-ossp";');
        echo "m231217_113258_alter_table_add_column_uuid cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231217_113258_alter_table_add_column_uuid cannot be reverted.\n";

        return false;
    }
    */
}
