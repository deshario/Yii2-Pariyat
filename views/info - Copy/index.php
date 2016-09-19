<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
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
    <?php
    $PdfHeader = [
        'L' => ['content' => ''],
        'C' => [
            'content' => 'รายชือนักเรียนทั้งหมด',
            'color' => '#333333',
            'font-size'   => 18,
        ],
        'R' => [
            'content' => 'Generated' . ' : ' . date("D, d/M/Y g:i a T"),
            'font-size' => 8,'color' => '#333333',
        ]
    ];
    $PdfFooter = [
        'L' => [
            'content' => '® Deshar Sunil',
            'font-size'   => 8,
            'font-style' => 'B',
            'color'       => '#333333',
        ],
        'C' => [
            'content' => '© Pariyat-ch.ac.th, 2016. All Rights Reserved',
            'color' => '#333333',
            'font-size'   => 10,
            'font-style' => 'B'
        ],
        'R' => [
            'content'     => '[{PAGENO}]',
            'font-size'   => 6,
            'font-family' => 'serif',
            'color'       => '#333333'
        ],
        'line' => TRUE,
    ];
    date_default_timezone_set('Asia/Bangkok');
    $date = date('m/d/Y h:i:s a', time());
    $exportFilename = 'pariyat@export=' . date('m/d/Y_h/i/s_a',time());
    $exportConfig = [
        GridView::TEXT => [
            'label' => 'Text',
            'icon' => 'file-text-o',
            'iconOptions' => ['class' => 'text-muted'],
            'showHeader' => true,
            'showPageSummary' => true,
            'showFooter' => true,
            'showCaption' => true,
            'filename' => $exportFilename,
            'alertMsg' => 'The TEXT export file will be generated for download.',
            'options' => ['title' => 'Tab Delimited Text'],
            'mime' => 'text/plain',
            'config' => [
                'colDelimiter' => "\t",
                'rowDelimiter' => "\r\n",
            ]
        ],
        GridView::EXCEL => [
            'label' => 'Excel',
            'icon' => 'file-excel-o',
            'iconOptions' => ['class' => 'text-success'],
            'showHeader' => TRUE,
            'showPageSummary' => TRUE,
            'showFooter' => TRUE,
            'showCaption' => TRUE,
            'filename' => $exportFilename,
            'alertMsg' => 'The EXCEL export file will be generated for download.',
            'options' => ['title' => 'Microsoft Excel 95+'],
            'mime' => 'application/vnd.ms-excel',
            'config' => [
                'worksheet' => 'Worksheet',
                'cssFile'   => ''
            ]
        ],
        GridView::PDF   => [
            'label' => 'PDF',
            'filename' => $exportFilename,
            'alertMsg' => 'The PDF export file will be generated for download.',
            'options' => ['title' => 'Portable Document Format'],
            'config' => [
                'mode' => 'UTF-8',
                'format' => 'A4', // A4-L
                'destination' => 'D',
                'marginTop' => 20,
                'marginBottom' => 20,
                'methods' => [
                    'SetHeader' => [
                        ['odd' => $PdfHeader, 'even' => $PdfHeader]
                    ],
                    'SetFooter' => [
                        ['odd' => $PdfFooter, 'even' => $PdfFooter]
                    ],
                ],
                'options' => [
                    'title' => 'รายชือนักเรียนทั้งหมด',
                    'subject' => 'PDF export',
                    'keywords' => 'pdf'
                ],
                'contentBefore' => '',
                'contentAfter' => ''
            ]
        ],
    ];
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn',
            'contentOptions' => [ 'style' => 'text-align:center'],
            'headerOptions' => ['style' => 'text-align:center'],
        ],
        'std_id_no',
        //'std_citizenship',
        'fullname',
        'std_nickname',
        'email',
        'std_roll_no',
        [
            'class'=>'kartik\grid\BooleanColumn',
            'attribute'=>'std_roll_no',
            'label'=>'สถานะ',
            'vAlign'=>'middle'
        ],
        [
            'attribute' => 'std_classroom',
            'format' => 'raw',
            'value' => function($model){
                return $model->getGrade();
            },
            'filter'=>\app\models\Info::itemsAlias('std_classroom'),
        ],

            ['class' => 'kartik\grid\ActionColumn',
                'header' => '<spin class="fa fa-cog fa-spin"></spin>'
//                'contentOptions' => [ 'style' => 'text-align:center'],
//                'headerOptions' => ['style' => 'text-align:center'],
            ],
    ];
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'responsiveWrap' => false,
        'hover' => true,
        'bordered' => true,
        'striped' => false,
        'resizableColumns' => true,
        'exportConfig' => $exportConfig,
        'pjax'=>false,
        'columns' => $gridColumns,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;ฐานข้อมูลนักเรียน',
            'before' => '',
            'after' => false,
            'footer' => false
        ],
        //set your toolbar
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], [ 'class' => 'btn btn-default', 'title'=>'Reset Grid']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])

            ],
            '{export}',
            '{toggleData}',
        ],
        'exportConfig' => $exportConfig,
        'export' => [
            'target'=>GridView::TARGET_BLANK,
            'fontAwesome' => true,
        ],
    ]);
    ?>
</div>
