<?php

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\About */

$this->title = Yii::t('about', 'Update about').': ' . $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('about', 'About'),
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
<div class="about-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
