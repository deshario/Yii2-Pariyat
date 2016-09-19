<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'std_id',
            'std_id_no',
            'std_citizenship',
            'std_nickname',
            'std_fname',
            // 'std_lname',
            // 'std_fname_en',
            // 'std_lname_en',
            // 'std_classroom',
            // 'std_roll_no',
            // 'std_classteacher',
            // 'std_profile',
            // 'std_family',
            // 'std_education',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
