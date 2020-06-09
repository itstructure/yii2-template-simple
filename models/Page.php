<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Itstructure\MultiLevelMenu\MenuWidget;
use Itstructure\MFUploader\behaviors\{BehaviorMediafile, BehaviorAlbum};
use Itstructure\MFUploader\models\OwnerAlbum;
use Itstructure\MFUploader\models\album\Album;
use Itstructure\MFUploader\interfaces\UploadModelInterface;
use app\traits\ThumbnailTrait;

/**
 * This is the model class for table "pages".
 *
 * @property int|string $thumbnail thumbnail(mediafile id or url).
 * @property array $albums Existing album ids.
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $metaKeys
 * @property string $metaDescription
 * @property string $created_at
 * @property string $updated_at
 * @property int $parentId
 * @property int $newParentId
 * @property string $icon
 * @property string $alias
 * @property int $active
 *
 * @package app\models
 */
class Page extends ActiveRecord
{
    use ThumbnailTrait;

    /**
     * @var int|string thumbnail(mediafile id or url).
     */
    public $thumbnail;

    /**
     * @var array
     */
    public $albums = [];

    /**
     * @var int
     */
    public $newParentId;

    /**
     * Initialize.
     * Set albums, that page has.
     */
    public function init()
    {
        $this->albums = $this->getAlbums();

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'content',
                    'active',
                    'alias',
                ],
                'required',
            ],
            [
                [
                    'description',
                    'content',
                ],
                'string',
            ],
            [
                [
                    'title',
                    'metaKeys',
                    'metaDescription',
                    'alias',
                ],
                'string',
                'max' => 255,
            ],
            [
                [
                    'parentId',
                    'newParentId',
                    'active'
                ],
                'integer',
            ],
            [
                'icon',
                'string',
                'max' => 64,
            ],
            [
                'alias',
                'filter',
                'filter' => function ($value) {
                    return preg_replace( '/[^a-z0-9_]+/', '-', strtolower(trim($value)));
                }
            ],
            [
                'alias',
                'unique',
                'skipOnError'     => true,
                'targetClass'     => static::class,
                'targetAttribute' => ['alias' => 'alias'],
                'filter' => 'id != '.$this->id
            ],
            [
                UploadModelInterface::FILE_TYPE_THUMB,
                function($attribute){
                    if (!is_numeric($this->{$attribute}) && !is_string($this->{$attribute})){
                        $this->addError($attribute, 'Tumbnail content must be a numeric or string.');
                    }
                },
                'skipOnError' => false,
            ],
            [
                'albums',
                'each',
                'rule' => ['integer'],
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
                    'updated_at',
                ],
                'safe',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'mediafile' => [
                'class' => BehaviorMediafile::class,
                'name' => static::tableName(),
                'attributes' => [
                    UploadModelInterface::FILE_TYPE_THUMB,
                ],
            ],
            'albums' => [
                'class' => BehaviorAlbum::class,
                'name' => static::tableName(),
                'attributes' => [
                    'albums',
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            UploadModelInterface::FILE_TYPE_THUMB,
            'albums',
            'id',
            'parentId',
            'icon',
            'alias',
            'active',
            'newParentId',
            'title',
            'description',
            'content',
            'metaKeys',
            'metaDescription',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentId' => 'Parent Id',
            'icon' => 'Icon',
            'active' => 'Active',
            'alias' => 'URL Alias',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'metaKeys' => 'Meta keys',
            'metaDescription' => 'Meta description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param bool $insert
     *
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->parentId = empty($this->newParentId) ? null : (int)$this->newParentId;

        if (empty($this->newParentId)) {
            $this->parentId = null;

        } elseif (MenuWidget::checkNewParentId($this, $this->newParentId)) {
            $this->parentId = $this->newParentId;
        }

        return parent::beforeSave($insert);
    }

    /**
     * Reassigning child objects to their new parent after delete the main model record.
     */
    public function afterDelete()
    {
        MenuWidget::afterDeleteMainModel($this);

        parent::afterDelete();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getMenu()
    {
        return static::find()->select([
            'id', 'parentId', 'title'
        ])->all();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getActiveMenu()
    {
        return static::find()->select([
            'id', 'parentId', 'title', 'alias'
        ])->where([
            'active' => 1
        ])->all();
    }

    /**
     * Get albums, that catalog has.
     *
     * @return Album[]
     */
    public function getAlbums()
    {
        return OwnerAlbum::getAlbumsQuery([
            'owner' => $this->tableName(),
            'ownerId' => $this->id,
            'ownerAttribute' => 'albums',
        ])->all();
    }
}
