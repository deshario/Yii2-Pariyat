<?php

use yii\helpers\Html;
use kartik\grid\GridView; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'responsiveWrap' => false,
        //'showPageSummary' => false,
        'panel' => [
            'type' => 'default',
            'heading' => '<i class="fa fa-users"></i>&nbsp;&nbsp; ผู้ใช้ทั้งหมด',
            'before' => false,
            'after' => false,
            'footer' => false
        ],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username', 
            // 'password_hash',
            //'password_reset_token',
            'email:email',
            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'status',
                'vAlign'=>'middle'
            ],
            [
                'attribute' => 'roles',
                'format' => 'raw',
                'value' => function($model){
                    return $model->getRoles();
                }
            ],
            [
                'attribute'=>'created_at',
                'format'=>'html',
                'value'=>function($model, $key, $index, $column){
                    return Yii::$app->formatter->asDateTime($model->created_at,'short'); //short,medium,long,full
                    //return Yii::$app->formatter->asDateTime($model->created_at,'medium');
                }
            ],
            [
                'attribute'=>'updated_at',
                'format'=>'html',
                'value'=>function($model, $key, $index, $column){
                    return Yii::$app->formatter->asDateTime($model->created_at,'short'); //short,medium,long,full
                    //return Yii::$app->formatter->asDateTime($model->created_at,'medium');
                }
            ],

            ['class' => 'yii\grid\ActionColumn','header' => 'Options'],
        ],
        'layout' => "{items}\n{pager}",
    ]); ?>
</div>