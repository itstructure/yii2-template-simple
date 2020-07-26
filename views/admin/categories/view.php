<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('categories', 'Categories'),
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

<div class="category-view">

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
                'label' => Yii::t('app', 'Title'),
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('app', 'Description'),
                'format' => 'raw',
            ],
            [
                'attribute' => 'content',
                'label' => Yii::t('app', 'Content'),
                'format' => 'raw',
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
                'attribute' => 'alias',
                'label' => Yii::t('app', 'URL Alias'),
            ],
            [
                'label' => Yii::t('app', 'Active status'),
                'value' => function($model) {
                    /* @var $model Category */
                    if ($model->active == 1){
                        return '<i class="fa fa-check-circle text-success"> ' . Yii::t('app', 'Active') . '</i>';
                    } else {
                        return '<i class="fa fa-times text-danger"> ' . Yii::t('app', 'Inactive') . '</i>';
                    }
                },
                'format' => 'raw',
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

    <?php echo Html::a(Yii::t('categories', 'View products'), [
        '/admin/products/index', 'ProductSearch[categoryId]' => $model->id
    ], [
        'class' => 'btn btn-primary'
    ]) ?>

</div>
