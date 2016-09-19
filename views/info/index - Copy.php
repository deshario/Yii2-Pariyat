<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Infos');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$(function() { 
   $('.popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('#modalContent')
     .load($(this).attr('href'));
   });
});");
$this->registerCss('
    .modal-body {
        max-height: calc(100vh - 210px);
        overflow-y: auto;
    }
');
?>

<?php
$ook = "User Data";
//$iid = Html::encode($this->title);
Modal::begin([
    'id' => 'modal',
    'size' => Modal::SIZE_LARGE,
    // 'header' => \app\models\info::getTitle(),
    'header' => '<h4 class="modal-title"><span class="glyphicon glyphicon-asterisk"></span> '.$ook.'</h4>',
    'class' => '',
    'options' => ['style' => '.modal-body{max-height: 50%; overflow-y: scroll;}']
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<div class="info-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Create Info</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   // 'std_id',
                    'std_id_no',
                    'std_citizenship',
                    'std_fname',
                    'std_lname',
                   // 'address',
                    // 'std_fname_en',
                    // 'std_lname_en',
                    // 'std_classroom',
                    // 'std_classteacher',
                    // 'std_profile',
                    // 'std_family',
                    // 'std_education',

                    ['class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} {delete}',
                        'buttons'=>[
//                            'view'=>function ($url, $model) {
//                                $t = ['info/view','id'=>$model->std_id];
//                                return  Html::a('<span class="glyphicon glyphicon-eye-open"></span> ',
//                                    Url::to($t), ['class' => '  popupModal',]);
//                            },
                            'update'=>function ($url, $model) {
                                $t = ['info/update','id'=>$model->std_id];
                                return  Html::a('<span class="glyphicon glyphicon-edit"></span> ',
                                    Url::to($t), ['class' => 'btn btn-primary btn-xs popupModal',]);
                            },
                        ],
                    ],
                ],
                'layout' => "{items}\n{pager}",
            ]); ?>
            <?php Pjax::end(); ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
