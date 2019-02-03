<?php

use yii\db\Migration;

/**
 * Handles the creation of table `home`.
 */
class m180603_123208_create_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('home',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(),
                'description' => $this->text(),
                'content' => $this->text(),
                'metaKeys' => $this->string(),
                'metaDescription' => $this->string(),
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
        $this->dropTable('home');
    }
}
