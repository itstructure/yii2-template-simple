<?php

namespace app\models;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property int $default
 * @property string $title
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $metaKeys
 * @property string $metaDescription
 * @property string $created_at
 * @property string $updated_at
 * @property string $mapQ
 * @property int $mapZoom
 *
 * @property ContactSocial[] $contactSocial
 * @property Social[] $social
 *
 * @package app\models
 */
class Contact extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
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
                    'title',
                    'metaKeys',
                    'metaDescription'
                ],
                'string',
                'max' => 255
            ],
            [
                [
                    'address'
                ],
                'string',
                'max' => 128
            ],
            [
                [
                    'email'
                ],
                'string',
                'max' => 64
            ],
            [
                [
                    'phone'
                ],
                'string',
                'max' => 32
            ],
            [
                [
                    'default',
                    'mapZoom'
                ],
                'integer'
            ],
            [
                'mapQ',
                'string',
                'max' => 255
            ],
            [
                'title',
                'unique',
                'skipOnError'     => true,
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
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'metaKeys' => 'Meta Keys',
            'metaDescription' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'mapQ' => 'Map place',
            'mapZoom' => 'Map zoom',
        ];
    }

    /**
     * Returns the default contacts record.
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getDefaultContacts()
    {
        return static::find()
            ->where([
                'default' => 1
            ])
            ->one();
    }

    /**
     * Reset the default contacts record.
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
     * @return \yii\db\ActiveQuery
     */
    public function getContactSocial()
    {
        return $this->hasMany(ContactSocial::class, [
            'contacts_id' => 'id'
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocial()
    {
        return $this->hasMany(Social::class, [
            'id' => 'social_id'
        ])->viaTable('contacts_social', [
            'contacts_id' => 'id'
        ]);
    }
}