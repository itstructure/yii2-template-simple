<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m180602_095657_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'address' => $this->string(128),
                'email' => $this->string(64),
                'phone' => $this->string(32),
                'metaKeys' => $this->string()->notNull(),
                'metaDescription' => $this->string()->notNull(),
                'default' => $this->tinyInteger(1)->defaultValue(0),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacts');
    }
}
