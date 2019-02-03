<?php
use app\models\About;

/* @var $model About */

$this->params['breadcrumbs'][] = $model->title;
?>

<section class="inform_block">
    <div class="container">
        <div class="row" data-animated="fadeIn">
            <div class="col-lg-12 col-md-12 col-sm-10">
                <?php echo $model->content ?>
            </div>
        </div>
    </div>
</section>
