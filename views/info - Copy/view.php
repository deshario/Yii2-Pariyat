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
            'groupOptions'=>['class'=>'']
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
                [ 'attribute'=>'mygrade', 'label' => 'ชั้นเรียน', 'valueColOptions'=>['style'=>'width:30%'],  ],
                [ 'attribute'=>'std_classteacher', 'valueColOptions'=>['style'=>'width:30%'],  ],
            ],
        ],
        [
            'group'=>true,
            'label'=>'SECTION 2: Profile',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'  ']
        ],
        [
            'columns' => [
                [ 'label'=>'วันเกิด','value'=>''.$profile->std_profile_birthdate,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'น้ำหนัก / ส่วนสูง','value'=>''.$profile->std_profile_weightheight,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [
            'columns' => [
                [ 'label'=>'อีเมล์','value'=>''.$profile->std_profile_email,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'การได้รับทุน','value'=>''.$profile->std_profile_studyfund,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [
            'columns' => [
                [ 'label'=>'เชื้อชาติ','value'=>''.$profile->std_profile_nationality,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'ศาสนา','value'=>''.$profile->std_profile_religion,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [
            'group'=>true,
            'label'=>'SECTION 3: Educational Bio',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>' ']
        ],
        [
            'columns' => [
                [ 'label'=>'ระดับการศึกษาเดิม','value'=>''.$education->std_education_level,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'สถานศึกษาเดิม','value'=>''.$education->std_education_academy,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [
            'columns' => [
                [ 'label'=>'วุฒิการศึกษาเดิม','value'=>''.$education->std_education_qualification,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'สำเร็จการศึกษาเมื่อปี','value'=>''.$education->std_education_graduationyear,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [ 'label'=>'เกรดเฉลี่ย','value'=>''.$education->std_education_gpa,],
        [ 'label'=>'ที่อยูสถานศึกษาเดิม','value'=>''.$education->std_education_address,],
        [
            'group'=>true,
            'label'=>'SECTION 4: Parent Bio',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>' ']
        ],

        [
            'columns' => [
                //[ 'label'=>'เลขบัตรประชาชน','value'=>''.$family->std_familybio_parentcitizenship,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'ชื่อผู้ปกครอง','value'=>''.$family->std_familybio_parentname,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'นามสกุลผู้ปกครอง','value'=>''.$family->std_familybio_parentsurname,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [
            'columns' => [
                [ 'label'=>'อาชีพผู้ปกครอง','value'=>''.$family->std_familybio_parentjob,'valueColOptions'=>['style'=>'width:30%'],],
                [ 'label'=>'รายได้ผู้ปกครอง','value'=>''.$family->std_familybio_parentsalary,'valueColOptions'=>['style'=>'width:30%'],],
            ],
        ],
        [ 'label'=>'ความสัมพันธ์','value'=>''.$family->std_familybio_parentrelation,],


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
            'heading'=>'<span class="fa fa-database"></span>&nbsp; Biography ',
            'type'=>DetailView::TYPE_PRIMARY,
            'headingOptions' => [
                'template' => '{title}' //{buttons}
            ]
        ],
        'attributes' => $info_attributes
    ])?>

    <?php Pjax::end()?>
</div>
