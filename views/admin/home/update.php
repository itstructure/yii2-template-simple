<?php

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\Home */

$this->title = Yii::t('home', 'Update home page').': ' . $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('home', 'Home page'),
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
<div class="home-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
