<?php
use yii\helpers\Html;
use app\models\UserNotification;
use yii\grid\GridView;
use kartik\datecontrol\DateControl;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->params['name'] . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <?php
                    $data = UserNotification::find()->all();
                    $count = count($data);
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?=$count;?></span>
                    </a>

                    <ul class="dropdown-menu button draw">
                        <li class="header">You have <?=$count;?> messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <!-- start message -->
                                <?php
                                $data = UserNotification::find()->all();
                                foreach ($data as $key){
                                    $count = count($data);
                                    ?>
                                    <li>
                                        <a href="<?=Yii::$app->homeUrl.$key->user_notification_url?>">
                                            <div class="pull-left">
                                                <img src="<?=$directoryAsset ?>/img/avatar04.png" class="img-circle" alt="User Image"/>
                                            </div>
                                            <h4>
                                                <?=$key->user_notification_title?>
                                                <!-- <small><i class="fa fa-clock-o"></i> 2 days</small> -->
                                            </h4>
                                            <p><?=$key->user_notification_data?></p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                <?php } ?>
                            </ul>

                        </li>
                        <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
                    </ul>

                </li>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bullhorn"></i>
                        <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-spinner fa-spin text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="footer"><a href="#">View all</a></li> -->
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                     alt="User Image"/>

                                <p><?= Yii::$app->user->identity->email; ?>
                                    <small>Member since <?php
                                        $created = Yii::$app->user->identity->created_at;
                                        echo $created;
                                        ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">
                                        <i class="fa fa-star"></i> Profile
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a(
                                        '<i class="fa fa-sign-out"></i> Sign out',
                                        ['/site/logout'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    ) ?>
                                </div>
                            </li>
                        </ul>
                    </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>

            </ul>
        </div>
    </nav>
</header>
