<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Itstructure\FieldWidgets\{Fields, FieldType};
use Itstructure\MultiLevelMenu\MenuWidget;

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var $categories array|\yii\db\ActiveRecord[] */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">

            <?php $this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/plugins/pbckcode/plugin.js', '');"); ?>

            <?php echo Fields::widget([
                'fields' => [
                    [
                        'name' => 'title',
                        'type' => FieldType::FIELD_TYPE_TEXT,
                        'label' => Yii::t('app', 'Title')
                    ],
                    [
                        'name' => 'description',
                        'type' => FieldType::FIELD_TYPE_TEXT_AREA,
                        'label' => Yii::t('app', 'Description')
                    ],
                    [
                        'name' => 'content',
                        'type' => FieldType::FIELD_TYPE_CKEDITOR_ADMIN,
                        'label' => Yii::t('app', 'Content'),
                        'preset' => 'full',
                        'options' => [
                            'filebrowserBrowseUrl' => '/ckfinder/ckfinder.html',
                            //'filebrowserImageBrowseUrl' => '/ckfinder/ckfinder.html?type=Images',
                            'filebrowserUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            'filebrowserImageUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            'filebrowserWindowWidth' => '1000',
                            'filebrowserWindowHeight' => '700',
                            'extraPlugins' => 'pbckcode',
                            'toolbarGroups' => [
                                ['name' => 'pbckcode']
                            ],
                            'allowedContent' => true,
                            'language' => Yii::$app->language,
                        ]
                    ],
                    [
                        'name' => 'metaKeys',
                        'type' => FieldType::FIELD_TYPE_TEXT,
                        'label' => Yii::t('app', 'Meta keys')
                    ],
                    [
                        'name' => 'metaDescription',
                        'type' => FieldType::FIELD_TYPE_TEXT,
                        'label' => Yii::t('app', 'Meta description')
                    ],
                ],
                'model'         => $model,
                'form'          => $form,
            ]) ?>

            <?php echo $form->field($model, 'alias')->textInput([
                'maxlength' => true,
                'style' => 'width: 25%;'
            ])->label(Yii::t('app', 'URL Alias')); ?>

            <?php echo $form->field($model, 'active')
                ->radioList([1 => Yii::t('app', 'Active'), 0 => Yii::t('app', 'Inactive')])
                ->label(Yii::t('app', 'Active status')); ?>

            <?php echo Html::label(Yii::t('app', 'Parent object'), 'multi-level-menu', [
                'class' => 'control-label'
            ]) ?>
            <?php echo MenuWidget::widget([
                'menuId' => 'multi-level-menu',
                'data' => $categories,
                'itemTemplate' => '@app/views/admin/categories/MultiLevelMenu/form.php',
                'itemTemplateParams' => [
                    'model' => $model
                ],
                'mainContainerOptions' => [
                    'levels' => [
                        ['style' => 'margin-left: 0; padding-left: 0;'],
                        ['style' => 'margin-left: 10px; padding-left: 10px;'],
                    ]
                ],
                'itemContainerOptions' => [
                    'style' => 'list-style-type: none;'
                ],
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
            ]
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
