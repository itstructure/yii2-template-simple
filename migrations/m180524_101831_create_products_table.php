<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180524_101831_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(),
                'description' => $this->text(),
                'content' => $this->text(),
                'metaKeys' => $this->string(),
                'metaDescription' => $this->string(),
                'pageId' => $this->integer(),
                'active' => $this->tinyInteger(1)->notNull()->defaultValue(0),
                'icon' => $this->string(64),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]
        );

        $this->createIndex(
            'idx-products-pageId',
            'products',
            'pageId'
        );

        $this->addForeignKey(
            'fk-products-pageId',
            'products',
            'pageId',
            'pages',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'idx-products-active',
            'products',
            'active'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-products-active',
            'products'
        );

        $this->dropForeignKey(
            'fk-products-pageId',
            'products'
        );

        $this->dropIndex(
            'idx-products-pageId',
            'products'
        );

        $this->dropTable('products');
    }
}
