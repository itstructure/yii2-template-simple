<?php

use yii\helpers\{Html, Url};
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use Itstructure\MFUploader\Module as MFUModule;
use Itstructure\MFUploader\models\album\Album;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('products', 'Products'),
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

<div class="product-view">

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
                'label' => Yii::t('app', 'Icon'),
                'value' => function($model) {
                    /* @var $model Product */
                    return Html::tag('i', '', ['class' => empty($model->icon) ? 'fa fa-file fa-2x' : $model->icon]);
                },
                'format' => 'raw',
            ],
            'thumbnail' => [
                'label' => MFUModule::t('main', 'Thumbnail'),
                'value' => function ($model) {
                    /* @var $model Product */
                    $thumbnailModel = $model->getThumbnailModel();
                    return $thumbnailModel == null ? '' : Html::a($model->getDefaultThumbImage(), Url::to($thumbnailModel->getThumbUrl(MFUModule::THUMB_ALIAS_LARGE)), [
                        'target' => '_blank'
                    ]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'alias',
                'label' => Yii::t('app', 'URL Alias'),
            ],
            [
                'label' => Yii::t('app', 'Active status'),
                'value' => function($model) {
                    /* @var $model Product */
                    if ($model->active == 1){
                        return '<i class="fa fa-check-circle text-success"> ' . Yii::t('app', 'Active') . '</i>';
                    } else {
                        return '<i class="fa fa-times text-danger"> ' . Yii::t('app', 'Inactive') . '</i>';
                    }
                },
                'format' => 'raw',
            ],
            [
                'label' => Yii::t('products', 'Parent page'),
                'value' => function ($model) {
                    /* @var $model Product */
                    return null === $model->page ? '' : Html::a(
                        $model->page->title,
                        Url::to(['/admin/pages/view', 'id' => $model->page->id]),
                        [
                            'target' => '_blank'
                        ]
                    );
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

    <h3><?php echo MFUModule::t('album', 'Albums') ?></h3>
    <?php echo GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $model->getAlbums()
        ]),
        'columns' => [
            'thumbnail' => [
                'label' => MFUModule::t('main', 'Thumbnail'),
                'value' => function($item) {
                    /** @var Album $item */
                    return Html::a(
                        $item->getDefaultThumbImage(),
                        Url::to([
                            '/mfuploader/'.$item->getFileType($item->type).'-album/view', 'id' => $item->id
                        ])
                    );
                },
                'format' => 'raw',
            ],
            'name' => [
                'label' => MFUModule::t('album', 'Title'),
                'value' => function($item) {
                    /** @var Album $item */
                    return Html::a(
                        Html::encode($item->title),
                        Url::to([
                            '/mfuploader/'.$item->getFileType($item->type).'-album/view', 'id' => $item->id
                        ])
                    );
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>

</div>
