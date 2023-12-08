<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_admin}}`.
 */
class m231208_063507_create_user_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_admin}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(150)->unique()->notNull(),
            'fullname' => $this->string(100)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'verification_token' => $this->string()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex("IDX-user_admin-email", '{{%user_admin%}}', 'email');

        $this->insert('{{%user_admin}}', [
            'email' => 'admin@localhost.dev',
            'fullname' => 'Administrator',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin212'),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex("IDX-user_admin-email", '{{%user_admin%}}');
        $this->dropTable('{{%user_admin}}');
    }
}
