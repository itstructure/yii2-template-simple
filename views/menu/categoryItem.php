<?php
use yii\helpers\{Html, Url, ArrayHelper};
/* @var app\models\Category $data */
/* @var array $linkOptions */

if (!isset($linkOptions)) {
    $linkOptions = [];
}

echo Html::a($data->title,
    Url::to('/category/'.$data->alias),
    ArrayHelper::merge([
        'target' => '_self'
    ], $linkOptions)
);
?>
