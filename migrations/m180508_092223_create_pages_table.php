<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180508_092223_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pages',
            [
                'id' => $this->primaryKey(),
                'parentId' => $this->integer(),
                'active' => $this->tinyInteger(1)->notNull()->defaultValue(0),
                'icon' => $this->string(64),
                'title' => $this->string(),
                'description' => $this->text(),
                'content' => $this->text(),
                'metaKeys' => $this->string(),
                'metaDescription' => $this->string(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]
        );

        $this->createIndex(
            'idx-pages-parentId',
            'pages',
            'parentId'
        );

        $this->createIndex(
            'idx-pages-active',
            'pages',
            'active'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-pages-parentId',
            'pages'
        );

        $this->dropIndex(
            'idx-pages-active',
            'pages'
        );

        $this->dropTable('pages');
    }
}
