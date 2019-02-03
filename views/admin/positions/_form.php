<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Itstructure\FieldWidgets\{Fields, FieldType};

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">

            <?php echo Fields::widget([
                'fields' => [
                    [
                        'name' => 'name',
                        'type' => FieldType::FIELD_TYPE_TEXT,
                        'label' => Yii::t('positions', 'Name'),
                    ],
                ],
                'model'         => $model,
                'form'          => $form,
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
