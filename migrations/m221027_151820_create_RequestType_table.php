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

          // add foreign key for table `linktype`
          $this->addForeignKey(
            'fk-link_type_id',
            'RequestType',
            'type',
            'linktype',
            'id',
            'CASCADE'
        );

        //insert Technical support
        $this->insert('RequestType', [
            'description'  => 'Servizi Web',
            'type' => 1,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Servizi Gaia',
            'type' => 1,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Servizi Telefonici',
            'type' => 1,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Altro',
            'type' => 1,
        ]);

        //insert Commercial support
        $this->insert('RequestType', [
            'description'  => 'Nuovo servizio',
            'type' => 2,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Richiesta fattura',
            'type' => 2,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Contatto commerciale',
            'type' => 2,
        ]);

        $this->insert('RequestType', [
            'description'  => 'Altro',
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
