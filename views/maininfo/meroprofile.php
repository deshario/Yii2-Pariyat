<?php
use app\models\Info;
use yii\helpers\ArrayHelper;
//    echo "Name : ".$info['std_fname']."<br/>";
//    echo "Surname : ".$info['std_lname']."<br/>";
//    echo "Classteacher : ".$info['std_classteacher']."<br/>";
//    echo "Level : ".$education['std_education_level']."<br/>";
//    echo "Email : ".$profile['std_profile_email']."<br/>";
//    echo "Dadname : ".$familybio['std_familybio_dadname']."<br/>";
?>
<?php
/* @var $this yii\web\View */
$this->title = "ฐานข้อมูลนักเรียน";
$grade = $info['std_classroom'];
echo $grade;

?>
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><span class="fa fa-database"></span>&nbsp;&nbsp;&nbsp;ฐานข้อมูลนักเรียน</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary"></span>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                          data-toggle="tab"><i class="fa fa-info-circle"></i>
                        ข้อมูลนักเรียน</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i
                            class="fa fa-user"></i> ประวัติส่วนตัว</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i
                            class="fa fa-users"></i> ประวัติผู้ปกครอง</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i
                            class="fa fa-graduation-cap"></i> ประวัติการศึกษา</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home" style="margin-bottom:-20px;">
                    <div style="padding:10px 2px 1px 2px;">
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <span class="fa fa-edit"></span>
                                        แก้ไขข้อมูล
                                    </button>
                                    <div class="col-md-12"><hr></div>
                                    <!-- -->
                                    <?php
                                    $data = array(
                                        '1' => 'รหัสนักศึกษา',
                                        'ชื่อ - สกุล', 'ชื่อ - สกุล (อังกฤษ)', 'รหัสประชาชน', 'ชั้นเรียน', 'อาจารย์ประจำชั้นเรียน',);
                                    $ans = array(
                                        '1' => $info['std_id_no'],
                                        $info['std_fname'].' '.$info['std_lname'],
                                        $info['std_fname_en'].' '.$info['std_lname_en'],
                                        $info['std_citizenship'],
                                        $info['std_classroom'],
                                        $info['std_classteacher'],
                                    );
                                    $count_data = count($data);
                                    $count_ans = count($ans);
                                    for ($i = 1; $i <= $count_data; $i++) {
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-2 control-label"><?php echo $data[$i]; ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $ans[$i]; ?>" readonly>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                    <!-- -->
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <label class="control-label">เข้าระบบล่าสุดเมื่อ : </label>
                                    <label style="font-weight: normal" class="control-label">
                                        14 สิงหาคม 2559 11:31:46
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile" style="margin-bottom:-20px;">
                    <div style="padding:10px 2px 1px 2px;">
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <span class="fa fa-edit"></span>
                                        แก้ไขข้อมูล
                                    </button>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <!-- -->
                                    <?php
                                    $data = array(
                                        '1' => 'ชื่อ', 'นามสกุล', 'วันเกิด', 'น้ำหนัก', 'อีเมล์', 'รับทุน', 'เชื้อชาติ', 'ศาสนา',
                                    );
                                    $value = array(
                                        '1' => $info['std_fname'],
                                        $info['std_lname'],
                                        $profile['std_profile_birthdate'],
                                        $profile['std_profile_weightheight'],
                                        $profile['std_profile_email'],
                                        $profile['std_profile_studyfund'],
                                        $profile['std_profile_nationality'],
                                        $profile['std_profile_religion'],
                                    );


                                    $count_data = count($data);
                                    //  echo "count is ".$count_data."<br/>";
                                    for ($i = 1; $i <= $count_data; $i++) {
                                        // echo $data[$i];
                                        // echo "<br/>";
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-2 control-label"><?php echo $data[$i]; ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly=""
                                                       value="<?php echo $value[$i]; ?>">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <!-- -->
                                    <div class="col-md-12"><hr></div>
                                    <div class="clearfix"></div>
                                    <?php
                                    $data =  array(
                                        '1' => 'บ้านเลขที่','หมู่ที่','ชื่อหมู่บ้าน','ชื่อถนน','ตำบล ','อำเภอ','จังหวัด','ไปรษณีย์','เบอร์โทร',
                                    );
                                    $value =  array(
                                        '1' =>  $profile['std_profile_houseno'],
                                                $profile['std_profile_villageno'],
                                                $profile['std_profile_villagename'],
                                                $profile['std_profile_streetname'],
                                                $profile['std_profile_tambol'],
                                                $profile['std_profile_amphur'],
                                                $profile['std_profile_province'],
                                                $profile['std_profile_zipcode'],
                                                '9841456586',
                                    );
                                    $count_data = count($data);
                                    for ($i = 1; $i <= $count_data; $i++) {
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-2 control-label"><?php echo $data[$i]; ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly=""
                                                       value="<?php echo $value[$i]; ?>">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages" style="margin-bottom:-20px;">
                    <div style="padding:10px 2px 1px 2px;">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <span class="fa fa-edit"></span>
                                        แก้ไขข้อมูล
                                    </button>
                                    <div class="col-md-12"><hr></div>
                                    <?php
                                    $data =  array(
                                        '1' => 'เลขบัตรประชาชน',
                                        'ชื่อผู้ปกครอง','นามสกุลผู้ปกครอง ','รายได้ผู้ปกครอง','อาชีพผู้ปกครอง','ความสัมพันธ์'
                                    );
                                    $value =  array(
                                        '1' => $familybio['std_familybio_parentcitizenship'],
                                               $familybio['std_familybio_parentname'],
                                               $familybio['std_familybio_parentsurname'],
                                               $familybio['std_familybio_parentjob'],
                                               $familybio['std_familybio_parentsalary'],
                                               $familybio['std_familybio_parentrelation'],
                                    );
                                    $count_data = count($data);
                                    for ($i = 1; $i <= $count_data; $i++) {
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-2 control-label"><?php echo $data[$i]; ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly=""
                                                       value="<?php echo $value[$i]; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="settings" style="margin-bottom:-20px;">
                    <div style="padding:10px 2px 1px 2px;">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <span class="fa fa-edit"></span>
                                        แก้ไขข้อมูล
                                    </button>
                                    <div class="col-md-12"><hr></div>
                                    <!-- -->
                                    <?php
                                    $data = array(
                                        '1' => 'ระดับการศึกษาเดิม',
                                        'สถานที่ศึกษาเดิม','วุฒิการศึกษาเดิม','สำเร็จการศึกษาเมื่อปี','เกรดเฉลี่ย','ที่อยูสถานศึกษาเดิม',
                                    );
                                    $value = array(
                                        '1' => $education['std_education_level'],
                                               $education['std_education_academy'],
                                               $education['std_education_qualification'],
                                               $education['std_education_graduationyear'],
                                               $education['std_education_gpa'],
                                               $education['std_education_address'],

                                    );
                                    $count_data = count($data);
                                    for ($i = 1; $i <= $count_data; $i++) {
                                        ?>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-2 control-label"><?php echo $data[$i]; ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" readonly=""
                                                       value="<?php echo $value[$i]; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- -->
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->

