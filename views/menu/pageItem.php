<?php
use yii\helpers\{Html, Url, ArrayHelper};
/* @var app\models\Page $data */
/* @var array $linkOptions */

if (!isset($linkOptions)) {
    $linkOptions = [];
}

echo Html::a($data->title,
    Url::to('/page/'.$data->id),
    ArrayHelper::merge([
        'target' => '_self'
    ], $linkOptions)
);
?>
