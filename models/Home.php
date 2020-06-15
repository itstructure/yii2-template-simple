<?php

namespace app\models;

/**
 * This is the model class for table "home".
 *
 * @property int $id
 * @property int $default
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $metaKeys
 * @property string $metaDescription
 * @property string $created_at
 * @property string $updated_at
 *
 * @package app\models
 */
class Home extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                ],
                'required'
            ],
            [
                [
                    'description',
                    'content'
                ],
                'string'
            ],
            [
                [
                    'title',
                    'metaKeys',
                    'metaDescription'
                ],
                'string',
                'max' => 255
            ],
            [
                [
                    'default'
                ],
                'integer'
            ],
            [
                'title',
                'unique',
                'skipOnError'     => true,
                'targetClass'     => static::class,
                'filter' => $this->getScenario() == self::SCENARIO_UPDATE ? 'id != '.$this->id : ''
            ],
            [
                [
                    'created_at',
                    'updated_at'
                ],
                'safe'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'default' => 'Default',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'metaKeys' => 'Meta Keys',
            'metaDescription' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Reset the default home record.
     *
     * @param boolean $insert
     *
     * @return mixed
     */
    public function beforeSave($insert)
    {
        if ($this->default == 1) {

            $default = static::findOne([
                'default' => 1,
            ]);

            if (null !== $default) {
                $default->default = 0;
                $default->save();
            }
        }

        return parent::beforeSave($insert);
    }

    /**
     * Returns the default home record.
     *
     * @return null|\yii\db\ActiveRecord
     */
    public static function getDefaultHome()
    {
        return static::find()
            ->where([
                'default' => 1
            ])
            ->one();
    }
}
