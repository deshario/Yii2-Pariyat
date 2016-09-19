<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Maininfo;

/* @var $this yii\web\View */
/* @var $model app\models\Maininfo */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="maininfo-form">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-refresh fa-spin"></span>&nbsp; <?php echo $this->title; ?></h3>
            <div class="box-tools pull-right"> </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{endWrapper}",
            ],
        ]); ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="fa fa-user"></span> User Information</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-4"><?= $form->field($model, 'std_citizenship')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_id_no')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_nickname')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_fname')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_lname')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_fname_en')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4"><?= $form->field($model, 'std_lname_en')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4">
                    <?= $form->field($model, 'std_classroom')->dropDownList([
                        Maininfo::M_ONE => $model->getGrade(Maininfo::M_ONE),
                        Maininfo::M_TWO => $model->getGrade(Maininfo::M_TWO),
                        Maininfo::M_THREE => $model->getGrade(Maininfo::M_THREE),
                        Maininfo::M_FOUR => $model->getGrade(Maininfo::M_FOUR),
                        Maininfo::M_FIVE => $model->getGrade(Maininfo::M_FIVE),
                        Maininfo::M_SIX => $model->getGrade(Maininfo::M_SIX),
                    ]) ?>
                </div>
                <div class="col-md-4"><?= $form->field($model, 'std_classteacher')->textInput(['maxlength' => true]) ?></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="fa fa-user"></span> User Profile</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_birthdate')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_weightheight')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_email')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_studyfund')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_nationality')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_religion')->textInput() ?></div>
                <div class="clearfix"></div><hr>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_houseno')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_villageno')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_villagename')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_streetname')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_tambol')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_amphur')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_province')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($profile, 'std_profile_zipcode')->textInput() ?></div>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="fa fa-book"></span> User Educational Bio</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-4"><?= $form->field($education, 'std_education_level')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($education, 'std_education_academy')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($education, 'std_education_qualification')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($education, 'std_education_graduationyear')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($education, 'std_education_gpa')->textInput() ?></div>
                <div class="clearfix"></div><hr>
                <div class="col-md-12"><?= $form->field($education, 'std_education_address')
                        ->textarea([
                            'style'=>'resize: none',
                            'rows'=>'2',
                            'placeholder' => 'ตัวอย่าง : 17/4 หมู่ 5 ถนนบำรุงราษฎร์ ตำบลพิบูลสงคราม อำเภอเมือง กรุงเทพมหานคร 10400'
                        ])?></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="fa fa-users"></span> User Family Bio</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentcitizenship')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentname')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentsurname')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentjob')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentsalary')->textInput() ?></div>
                <div class="col-md-4"><?= $form->field($family, 'std_familybio_parentrelation')->textInput() ?></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
            <div class="form-group pull-right">
                <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-check"></span> Create' : '<span class="glyphicon glyphicon-check"></span> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::resetButton($model->isNewRecord ? '<span class="glyphicon glyphicon-trash"></span> Clear' : '<span class="glyphicon glyphicon-clear"></span> Clear', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
            </div>
    </div><!-- /.box -->

    <?php ActiveForm::end(); ?>
</div>
