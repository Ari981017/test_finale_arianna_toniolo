<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%linktype}}`.
 */
class m221016_090104_create_linktype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%linktype}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
        ]);


        $this->insert('linktype', [
            'type' => 'Technical support',
        ]);

        $this->insert('linktype', [
            'type' => 'Commercial support',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%linktype}}');
    }
}
