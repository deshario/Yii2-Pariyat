<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

//$this->title = Yii::t('app', 'Update {modelClass}: ', [
//    'modelClass' => 'Info',
//]) . $model->std_id;
$this->title = "Update Bio";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->std_id, 'url' => ['view', 'id' => $model->std_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="info-update">
    <?= $this->render('_form', [
        'model' => $model,
        'education' => $education,
        'profile' => $profile,
        'family' => $family,
    ]) ?>
</div>
