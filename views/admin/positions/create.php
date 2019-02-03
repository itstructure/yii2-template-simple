<?php

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\Position */

$this->title = Yii::t('positions', 'Create position');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('positions', 'Positions'),
    'url' => [
        $this->params['urlPrefix'].'index'
    ]
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="positions-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
