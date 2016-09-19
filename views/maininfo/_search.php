<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaininfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maininfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'std_id') ?>

    <?= $form->field($model, 'std_id_no') ?>

    <?= $form->field($model, 'std_citizenship') ?>

    <?= $form->field($model, 'std_nickname') ?>

    <?= $form->field($model, 'std_fname') ?>

    <?php // echo $form->field($model, 'std_lname') ?>

    <?php // echo $form->field($model, 'std_fname_en') ?>

    <?php // echo $form->field($model, 'std_lname_en') ?>

    <?php // echo $form->field($model, 'std_classroom') ?>

    <?php // echo $form->field($model, 'std_roll_no') ?>

    <?php // echo $form->field($model, 'std_classteacher') ?>

    <?php // echo $form->field($model, 'std_profile') ?>

    <?php // echo $form->field($model, 'std_family') ?>

    <?php // echo $form->field($model, 'std_education') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
