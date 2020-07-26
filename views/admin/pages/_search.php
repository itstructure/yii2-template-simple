<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this Itstructure\AdminModule\components\AdminView */
/* @var $model app\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('[role="clear-button"]').on("click", function(e) {
            e.preventDefault();
            $("input[type=radio]").each(function(){
                $(this).prop("checked",false);
            });
            $("input[type=text]").each(function(){
                $(this).prop("value","");
            });
        });
    });
</script>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => [
            $this->params['urlPrefix'].'index'
        ],
        'method' => 'get',
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><b><?php echo Yii::t('app', 'Search'); ?></b></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->field($model, 'id') ?>
                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                        <?php echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default', 'role' => 'clear-button']) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php echo $form->field($model, 'title') ?>
                    <?php echo $form->field($model, 'description') ?>
                </div>
                <div class="col-md-4">
                    <?php echo $form->field($model, 'created_at') ?>
                    <?php echo $form->field($model, 'updated_at') ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
