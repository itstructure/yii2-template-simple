<?php

namespace app\models;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Position extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                'name',
                'required',
            ],
            [
                'name',
                'string',
                'max' => 255
            ],
            [
                'name',
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
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPositions()
    {
        return static::find()
            ->orderBy([
                'id' => SORT_ASC
            ])->all();
    }
}
