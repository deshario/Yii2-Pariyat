<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maininfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', ['modelClass' => 'Profile ',]) . $model->std_nickname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maininfos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->std_id, 'url' => ['view', 'id' => $model->std_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="maininfo-update">

    <?= $this->render('_form', [
        'model' => $model,
        'education' => $education,
        'profile' => $profile,
        'family' => $family,
    ]) ?>

</div>
