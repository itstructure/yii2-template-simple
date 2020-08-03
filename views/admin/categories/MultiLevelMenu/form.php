<?php
use yii\helpers\Html;
use Itstructure\MultiLevelMenu\MenuWidget;
use app\models\Category;

/* @var Category $data */
/* @var Category $model */
?>
<?php echo Html::activeRadio($model, 'parentId', [
    'value' => $data->id,
    'name' => Html::getInputName($model, 'parentId'),
    'label' => Html::encode($data->title),
    'disabled' => !MenuWidget::checkNewParentId($model, $data->id),
    'uncheck' => false,
    'onMouseDown' => 'this.isChecked=this.checked;',
    'onClick' => 'this.checked=!this.isChecked;',
]);  ?>
