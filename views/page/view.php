<?php
use yii\widgets\LinkPager;
use yii\data\Pagination;
use app\models\{Page, Article};
use app\helpers\BaseHelper;

/* @var Page $model */
/* @var Article[] $articles */
/* @var Pagination $pagination */

$this->params['breadcrumbs'][] = $model->title;
?>

<?php if (!empty($model->content)): ?>
    <section class="inform_block">

        <div class="container">
            <?php if (!empty($model->description)) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $model->description ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <?php echo $model->content ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (count($articles) > 0): ?>
    <section class="inform_block">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?php /* @var Article $article */ ?>
                    <?php foreach ($articles as $article): ?>
                        <div class="post">
                            <h2>
                                <span class="<?php echo $article->icon ?>"></span>
                                <a href="<?php echo '/article/'.$article->alias ?>" alt="<?php echo $article->title ?>">
                                    <?php echo $article->title ?>
                                </a>
                            </h2>
                            <div class="post_meta"><?php echo Yii::t('articles', 'Posted').' '.BaseHelper::getDateAt($article->updated_at) ?></div>
                            <?php echo $article->description ?>
                        </div>
                    <?php endforeach;?>
                    <?php echo LinkPager::widget(['pagination' => $pagination]); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
