<?php
use app\models\Article;
use Itstructure\MFUploader\Module as MFUModule;
use Itstructure\MFUploader\models\Mediafile;

/* @var Article $model */
/* @var Mediafile[] $images */

$this->params['breadcrumbs'][] = $model->title;
?>

<style>
    .file-item {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>

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

            <div class="row">
                <?php foreach ($images as $key => $image): ?>
                    <div class="col-12 col-lg-6 file-item">
                        <div class="media">
                            <div class="media-left" id="image-container-<?php echo $key; ?>">
                                <a href="<?php echo $image->getThumbUrl(MFUModule::THUMB_ALIAS_ORIGINAL); ?>" target="_blank">
                                    <img src="<?php echo $image->getThumbUrl(MFUModule::THUMB_ALIAS_MEDIUM); ?>" alt="<?php echo $image->alt; ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 id="title-container-<?php echo $key; ?>" class="media-heading">
                                    <?php echo $image->title ?>
                                </h4>
                                <div id="description-container-<?php echo $key; ?>">
                                    <?php echo $image->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

