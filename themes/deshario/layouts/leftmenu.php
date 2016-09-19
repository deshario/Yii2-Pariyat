<?php
use app\components\NavLTE;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?php if (Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Guest</p>
                    <a href="">
                        <i class="fa fa-circle text-danger"></i>Low Access
                    </a>
                </div>
            </div>
        <?php endif ?>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar04.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>

        <!-- You can delete next ul.sidebar-menu. It's just demo. -->

        <?=
        NavLTE::widget(
            [
                'items' => [
                    ['label' => 'นักเรียนทั้งหมด', 'ico' => 'fa fa-home', 'url' => ['maininfo/index']],
                    ['label' => 'ประวัติส่วนตัว', 'ico' => 'fa fa-database', 'url' => ['maininfo/meroprofile']],
                    ['label' => 'ผู้ใช้ทั้งหมด', 'ico' => 'fa fa-user', 'url' => ['user/index']],
                    ['label' => 'register', 'ico' => 'fa fa-home', 'url' => ['site/signup']],
//                    ['label' => 'แผงควบคุม', 'ico' => 'fa fa-tachometer', 'url' => ['/site/index']],
//                   //['label' => 'เอกสาร', 'url' => ['/news/index'], 'ico' => 'th', 'badge' => [ 'text' => 'new', 'color' => 'green', 'ico' => 'check' ] ],
//                    [
//                        'label' => 'นักเรียนทั้งหมด',
//                        'url' => '#',
//                        'ico' => 'fa fa-users',
//                        'items' => [
//                            ['label' => 'ชั้นมัธยมศึกษาทั้งหมด', 'ico' => 'fa fa-home', 'url' => ['/students/index'],'badge' => '500'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 1', 'ico' => 'fa fa-user', 'url' => ['/students/m_one'],'badge' => '10'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 2', 'ico' => 'fa fa-user', 'url' => ['/students/m_two'],'badge' => '20'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 3', 'ico' => 'fa fa-user', 'url' => ['/students/m_three'],'badge' => '30'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 4', 'ico' => 'fa fa-user', 'url' => ['/students/m_four'],'badge' => '40'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 5', 'ico' => 'fa fa-user', 'url' => ['/students/m_five'],'badge' => '50'],
//                            ['label' => 'ชั้นมัธยมศึกษาปีที่ 6', 'ico' => 'fa fa-user', 'url' => ['/students/m_six'],'badge' => '60'],
//                        ],
//                    ],
//                    ['label' => 'ผลกการเรียน', 'ico' => 'fa fa-tachometer', 'url' => ['/exam-table/result']],
//                    ['label' => 'แบบประเมิน', 'ico' => 'fa fa-tachometer', 'url' => ['/evaluation/index']],
//                    ['label' => 'ตารางเรียน', 'ico' => 'fa fa-tachometer', 'url' => ['/exam-table/study_schedule']],
//                    ['label' => 'ตารางสอบ', 'ico' => 'fa fa-tachometer', 'url' => ['/exam-table/exam_schedule']],
//                    ['label' => 'ลาเรียน', 'ico' => 'fa fa-tachometer', 'url' => ['/absence/index']],
                ],
            ]
        );
        ?>


    </section>
</aside>