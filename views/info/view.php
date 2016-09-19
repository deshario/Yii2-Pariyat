<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->std_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">
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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->std_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->std_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_id',
            'std_id_no',
            'std_citizenship',
            'std_nickname',
            'std_fname',
            'std_lname',
            'std_fname_en',
            'std_lname_en',
            'std_classroom',
            'std_roll_no',
            'std_classteacher',
            'std_profile',
            'std_family',
            'std_education',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Information ',
            'type'=>DetailView::TYPE_PRIMARY,
            'headingOptions' => [
                'template' => '{title}' //{buttons}
            ]
        ],
        'attributes' => $info_attributes
    ])?>

</div>
