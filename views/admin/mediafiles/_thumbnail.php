<?php

use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use app\traits\ThumbnailTrait;
use Itstructure\MFUploader\Module;
use Itstructure\MFUploader\widgets\FileSetter;
use Itstructure\MFUploader\interfaces\UploadModelInterface;

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model ActiveRecord|ThumbnailTrait */
/* @var $ownerParams array */
?>

<div id="thumbnail-container">
    <?php echo $model->getDefaultThumbImage(); ?>
</div>
<?php echo FileSetter::widget(ArrayHelper::merge([
        'model' => $model,
        'attribute' => UploadModelInterface::FILE_TYPE_THUMB,
        'neededFileType' => UploadModelInterface::FILE_TYPE_THUMB,
        'buttonName' => Module::t('main', 'Set thumbnail'),
        'resetButtonName' => Module::t('main', 'Clear'),
        'options' => [
            'value' => ($thumbnailModel = $model->getThumbnailModel()) !== null ? $thumbnailModel->{FileSetter::INSERTED_DATA_ID} : null,
        ],
        'mediafileContainer' => '#thumbnail-container',
        'subDir' => $model->tableName()
    ], isset($ownerParams) && is_array($ownerParams) ? ArrayHelper::merge([
        'ownerAttribute' => UploadModelInterface::FILE_TYPE_THUMB
    ], $ownerParams) : [])
); ?>
