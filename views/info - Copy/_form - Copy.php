<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <?php $form = ActiveForm::begin([    ]); ?>


        <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> User Information</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-4"><?= $form->field($model, 'std_citizenship')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_id_no')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_id_no')->textInput(['maxlength' => true]) ?></div>

            <div class="col-md-4"><?= $form->field($model, 'std_fname')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_lname')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_fname_en')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_lname_en')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_classroom')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_classteacher')->textInput(['maxlength' => true]) ?></div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-md-4"><?= $form->field($model, 'std_profile')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_family')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-4"><?= $form->field($model, 'std_education')->textInput(['maxlength' => true]) ?></div>
            <div class="clearfix"></div>
            <hr/>
            <?= $form->field($profile, 'std_profile_email')->textInput() ?>
            <div class="clearfix"></div>
            <hr/>
            <?= $form->field($education, 'std_education_academy')->textInput() ?>
            <div class="clearfix"></div>
            <hr/>
            <?= $form->field($family, 'std_familybio_dadcitizenship')->textInput() ?>
            <div class="clearfix"></div>
            <hr/>
            <div class="form-group pull-right">
                <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-check"></span> Create' : '<span class="glyphicon glyphicon-check"></span> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::resetButton($model->isNewRecord ? '<span class="glyphicon glyphicon-trash"></span> Clear' : '<span class="glyphicon glyphicon-clear"></span> Clear', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->





    <?php ActiveForm::end(); ?>

</div>
