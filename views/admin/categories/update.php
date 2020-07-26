<?php

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\Category */
/* @var $categories array|\yii\db\ActiveRecord[] */

$this->title = Yii::t('categories', 'Update category').': ' . $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('categories', 'Categories'),
    'url' => [
        $this->params['urlPrefix'].'index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $model->title,
    'url' => [
        $this->params['urlPrefix'].'view',
        'id' => $model->id
    ]
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
