<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maininfo */

$this->title = Yii::t('app', 'Create Maininfo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maininfos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maininfo-create"> 

    <?= $this->render('_form', [
        'model' => $model,
        'education' => $education,
        'profile' => $profile,
        'family' => $family,
    ]) ?>

</div>
