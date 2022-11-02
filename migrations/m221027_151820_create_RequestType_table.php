<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%RequestType}}`.
 */
class m221027_151820_create_RequestType_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%RequestType}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string()->notNull(),
            'type' => $this->integer(),
        ]);

        //insert Technical support
        $this->insert('RequestType', [
            'description'  => 'Technical support',
            'type' => 1,
        ]);

        //insert Commercial support
        $this->insert('RequestType', [
            'description'  => 'Commercial support',
            'type' => 2,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%RequestType}}');
    }
}
