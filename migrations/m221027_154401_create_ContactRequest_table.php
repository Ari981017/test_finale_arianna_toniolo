<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ContactRequest}}`.
 */
class m221027_154401_create_ContactRequest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ContactRequest}}', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string()->notNull(),
            'email'             => $this->string()->notNull(),
            'request_body'      => $this->string()->notNull(),
            'request_date'      => $this->timestamp()->notNull(),
            'request_type_id'   => $this->integer(),
        ]);
         
        // add foreign key for table RequestType
         $this->addForeignKey(
            'fk-RequestType_id',
            'ContactRequest',
            'request_type_id',
            'RequestType',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ContactRequest}}');
    }
}
