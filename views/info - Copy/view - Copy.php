<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->std_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">
    <?php Pjax::begin()?>
    <?php
    $info_attributes = [
        [
            'group'=>true,
            'label'=>'SECTION 1: Information',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-center']
        ],
        [
            'label'=>'std_fname',
            'value'=>''.$profile->std_profile_birthdate,
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_citizenship', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_id_no', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_fname', //'label'=>'',
                    'valueColOptions'=>['style'=>'width:30%']  ],
                [ 'attribute'=>'std_lname', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_fname_en', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_lname_en', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_classroom', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_classteacher', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_profile', 'valueColOptions'=>['style'=>'width:10%'],  ],
                [ 'attribute'=>'std_family', 'valueColOptions'=>['style'=>'width:10%'],  ],
                [ 'attribute'=>'std_education', 'valueColOptions'=>['style'=>'width:10%'],  ],
            ],
        ],
//        [
//            'label'=>'std_fname',
//            'value'=>''.$profile->std_profile_birthdate,
//        ],

    ];
    $profile_attributes = [
        [
            'group'=>true,
            'label'=>'SECTION 2: Profile',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-center']
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_profile_birthdate', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_profile_weightheight', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_profile_email', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_profile_studyfund', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_profile_nationality', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_profile_religion', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [
                    'label'=>'ที่อยู่',
                    'value'=>'' . $model->address ,
                    'valueColOptions'=>['style'=>'width:100%'],
                ],
            ],
        ],
    ];
    $education_attributes = [
        [
            'group'=>true,
            'label'=>'SECTION 3: Education',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-center']
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_education_level', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_education_academy', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_education_qualification', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_education_graduationyear', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                  [ 'attribute'=>'std_education_gpa',  'label' => 'เกรดเฉลี่ย'  ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute'=>'std_education_address',
                    'value'=>'' . $model->address ,
                ],
            ],
        ],
    ];
    $family_attributes = [
        [
            'group'=>true,
            'label'=>'SECTION 3: Family',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-center']
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_familybio_parentcitizenship', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_familybio_parentname', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_familybio_parentsurname', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_familybio_parentjob', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ]
        ],
        [
            'columns' => [
                [ 'attribute'=>'std_familybio_parentsalary', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_familybio_parentrelation', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ]
        ]
    ];
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Information ',
            'type'=>DetailView::TYPE_PRIMARY,
//            'headingOptions' => [
//                'template' => '{title}' //{buttons}
//            ]
        ],
        'attributes' => $info_attributes
    ])?>

    <?= DetailView::widget([
        'model' => $profile,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Profile ',
            'type'=>DetailView::TYPE_PRIMARY,
//            'headingOptions' => [
//                'template' => '{title}' //{buttons}
//            ]
        ],
        'attributes' => $profile_attributes,
    ])?>

    <?= DetailView::widget([
        'model' => $education,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Education ',
            'type'=>DetailView::TYPE_PRIMARY,
//            'headingOptions' => [
//                'template' => '{title}' //{buttons}
//            ]
        ],
        'attributes' => $education_attributes,
    ])?>

    <?= DetailView::widget([
        'model' => $family,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Education ',
            'type'=>DetailView::TYPE_PRIMARY,
//            'headingOptions' => [
//                'template' => '{title}' //{buttons}
//            ]
        ],
        'attributes' => $family_attributes,
    ])?>


    <?php Pjax::end()?>
</div>
