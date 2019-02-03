<?php
use yii\helpers\Html;

/* @var app\models\Product $model */
/* @var app\models\Page $data */
?>
<?php echo Html::activeRadio($model, 'pageId', [
    'value' => $data->id,
    'name' => Html::getInputName($model, 'pageId'),
    'label' => Html::encode($data->title),
    'uncheck' => false,
]);  ?>
