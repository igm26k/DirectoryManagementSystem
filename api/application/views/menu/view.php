<?php

use app\models\dictionary\DictionaryMeta;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\menu\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'  => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            '_id',
            'name',
            [
                'attribute' => 'dictionaryId',
                'format'    => 'raw',
                'value'     => function ($data) {
                    return DictionaryMeta::nameById($data->dictionaryId);
                },
            ],
            'active:boolean',
        ],
    ]) ?>
</div>
