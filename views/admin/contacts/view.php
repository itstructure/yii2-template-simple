<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('contacts', 'Contacts'),
    'url' => [
        $this->params['urlPrefix'].'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    h5 {
        font-weight: bold;
        padding: 5px;
    }
</style>

<div class="contact-view">

    <p>
        <?php echo Html::a(Yii::t('app', 'Update'), [
            $this->params['urlPrefix'].'update',
            'id' => $model->id
        ], [
            'class' => 'btn btn-primary'
        ]) ?>

        <?php echo Html::a(Yii::t('app', 'Delete'), [
            $this->params['urlPrefix'].'delete',
            'id' => $model->id
        ], [
            'class' => 'btn btn-danger',
            'data'=>[
                'method' => 'post',
                'confirm' => Yii::t('app', 'Are you sure you want to do this action?'),
            ]
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'title',
                'label' => Yii::t('contacts', 'Title'),
            ],
            [
                'attribute' => 'address',
                'label' => Yii::t('contacts', 'Address'),
            ],
            [
                'attribute' => 'email',
                'label' => Yii::t('contacts', 'Email'),
            ],
            [
                'attribute' => 'phone',
                'label' => Yii::t('contacts', 'Phone'),
            ],
            [
                'attribute' => 'metaKeys',
                'label' => Yii::t('app', 'Meta keys'),
            ],
            [
                'attribute' => 'metaDescription',
                'label' => Yii::t('app', 'Meta description'),
            ],
            [
                'label' => Yii::t('app', 'Default status'),
                'value' => function($model) {
                    /* @var $model app\models\Contact */
                    if ($model->default == 1){
                        return '<i class="fa fa-check-circle text-success"> ' . Yii::t('app', 'Default') . '</i>';
                    } else {
                        return '<i class="fa fa-times text-danger"> ' . Yii::t('app', 'No') . '</i>';
                    }
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'mapQ',
                'label' => Yii::t('contacts', 'Map place'),
            ],
            [
                'attribute' => 'mapZoom',
                'label' => Yii::t('contacts', 'Map zoom'),
            ],
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
                'label' => Yii::t('app', 'Created date'),
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
                'label' => Yii::t('app', 'Updated date'),
            ],
        ],
    ]) ?>

</div>
