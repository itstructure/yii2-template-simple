<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\{Contact, Feedback};

/* @var Contact $model */
/* @var Feedback $feedback */

$this->params['breadcrumbs'][] = $model->title;
?>

<section class="contacts_block">

    <!-- MAP -->
    <div id="map" class="full_width">
        <iframe width="100%" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?f=q&give a hand=s_q&hl=<?php echo Yii::$app->language; ?>&q=<?php echo $model->mapQ; ?>&ie=UTF8&z=<?php echo $model->mapZoom; ?>&output=embed"></iframe>
    </div><!-- //MAP -->

    <div class="container">

        <div class="row">
            <div class="col-lg-7 col-sm-7 padbot20" data-animated="fadeIn">
                <h2><?php echo Yii::t('contacts', 'Get in Touch') ?></h2>

                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo Yii::t('feedback', 'You have successfully sent your message.'); ?>
                    </div>

                    <?php if (Yii::$app->mailer->useFileTransport): ?>
                    <p>Because the application is in development mode, the email is not sent but saved as a file under <code><?php echo Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>. Please configure the <code>useFileTransport</code> property of the <code>mail</code> application component to be false to enable email sending.</p>
                    <?php endif; ?>

                <?php else: ?>

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?php echo $form->field($feedback, 'name')->textInput(['autofocus' => true])->label(Yii::t('feedback', 'Name')) ?>

                    <?php echo $form->field($feedback, 'email')->textInput(['autofocus' => true])->label(Yii::t('feedback', 'Email')) ?>

                    <?php echo $form->field($feedback, 'subject')->textInput(['autofocus' => true])->label(Yii::t('feedback', 'Subject')) ?>

                    <?php echo $form->field($feedback, 'message')->textarea(['rows' => 6])->label(Yii::t('feedback', 'Message')) ?>

                    <?php echo $form->field($feedback, 'verifyCode')->widget(Captcha::class, [
                        'captchaAction' => '/contact/captcha',
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->label(Yii::t('feedback', 'Verify code')) ?>

                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('app', 'Send'), [
                            'class' => 'btn btn-primary',
                            'name' => 'contact-button'
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                <?php endif; ?>

            </div>
            <div class="col-lg-5 col-sm-5 padbot20" data-animated="fadeIn">
                <h2><?php echo Yii::t('contacts', 'Communication') ?></h2>

                <ul>
                    <?php if (!empty($model->address)): ?>
                        <li><b class="fa fa-home"></b> <span> <?php echo $model->address ?></span></li>
                    <?php endif; ?>
                    <?php if (!empty($model->phone)): ?>
                        <li><b class="fa fa-phone"></b> <span> <?php echo $model->phone ?></span></li>
                    <?php endif; ?>
                    <?php if (!empty($model->email)): ?>
                        <li><b class="fa fa-envelope-o"></b> <span><a href="mailto:<?php echo $model->email ?>"> <?php echo $model->email ?></a></span></li>
                    <?php endif; ?>

                    <?php if (is_array($model->social)): ?>
                        <?php foreach ($model->social as $social): ?>
                            <li>
                                <b class="<?php echo $social->icon ?>"></b>
                                <span><a href="<?php echo $social->url ?>" target="_blank" ><?php echo $social->url ?></a></span>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
