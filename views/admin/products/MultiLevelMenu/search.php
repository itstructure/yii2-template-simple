<?php
use yii\helpers\Html;

/* @var app\models\Product $model */
/* @var app\models\Category $data */
?>
<?php echo Html::activeRadio($model, 'categoryId', [
    'value' => $data->id,
    'name' => Html::getInputName($model, 'categoryId'),
    'label' => Html::encode($data->title),
    'uncheck' => false,
    'onMouseDown' => 'this.isChecked=this.checked;',
    'onClick' => 'this.checked=!this.isChecked;',
]);  ?>
