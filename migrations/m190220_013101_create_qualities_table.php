<?php

use yii\db\Migration;

/**
 * Handles the creation of table `qualities`.
 */
class m190220_013101_create_qualities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('qualities',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'description' => $this->string(1024)->notNull(),
                'icon' => $this->string(64)->notNull(),
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
        $this->dropTable('qualities');
    }
}
