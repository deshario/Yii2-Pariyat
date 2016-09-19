<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "db_student_info".
 *
 * @property integer $std_id
 * @property string $std_id_no
 * @property string $std_citizenship
 * @property string $std_nickname
 * @property string $std_fname
 * @property string $std_lname
 * @property string $std_fname_en
 * @property string $std_lname_en
 * @property integer $std_classroom
 * @property integer $std_roll_no
 * @property string $std_classteacher
 * @property integer $std_profile
 * @property integer $std_family
 * @property integer $std_education
 */
class Info extends \yii\db\ActiveRecord
{
    public static function itemsAlias($key){

        $items = [
            'title'=>[
                1 => 'นาย',
                2 => 'นางสาว',
                3 => 'นาง'
            ],
            'grade' => [
                self::M_ONE => 'ชั้นมัธยมศึกษาปีที่ 1',
                self::M_TWO => 'ชั้นมัธยมศึกษาปีที่ 2',
                self::M_THREE => 'ชั้นมัธยมศึกษาปีที่ 3',
                self::M_FOUR => 'ชั้นมัธยมศึกษาปีที่ 4',
                self::M_FIVE => 'ชั้นมัธยมศึกษาปีที่ 5',
                self::M_SIX => 'ชั้นมัธยมศึกษาปีที่ 6',
            ],
        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getItemGrade()
    {
        return self::itemsAlias('grade');
    }

    const M_ONE = 10;
    const M_TWO = 20;
    const M_THREE = 30;
    const M_FOUR = 40;
    const M_FIVE = 50;
    const M_SIX = 60;

    public $strGrade = [
        self::M_ONE => 'ชั้นมัธยมศึกษาปีที่ 1',
        self::M_TWO => 'ชั้นมัธยมศึกษาปีที่ 2',
        self::M_THREE => 'ชั้นมัธยมศึกษาปีที่ 3',
        self::M_FOUR => 'ชั้นมัธยมศึกษาปีที่ 4',
        self::M_FIVE => 'ชั้นมัธยมศึกษาปีที่ 5',
        self::M_SIX => 'ชั้นมัธยมศึกษาปีที่ 6',
    ];

    public function getGrade($student_grade = null){
        if ($student_grade === null){
            return Yii::t('app',$this->strGrade[$this->std_classroom]);
        }
        return Yii::t('app',$this->strGrade[$student_grade]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_student_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id_no', 'std_citizenship', 'std_nickname'], 'required'],
            [['std_classroom', 'std_roll_no', 'std_profile', 'std_family', 'std_education'], 'integer'],
//            [['std_id_no'], 'string', 'max' => 10],
//            [['std_citizenship'], 'string', 'max' => 13],
//            [['std_nickname'], 'string', 'max' => 30],
            [['std_fname', 'std_lname', 'std_fname_en', 'std_lname_en', 'std_classteacher'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_id' => Yii::t('app', 'Std ID'),
            'std_id_no' => Yii::t('app', 'รหัสนักเรียน'),
            'std_citizenship' => Yii::t('app', 'รหัสประชาชน'),
            'std_nickname' => Yii::t('app', 'ชือเล่น'),
            'std_fname' => Yii::t('app', 'ชื่อ'),
            'std_lname' => Yii::t('app', 'สกุล'),
            'std_fname_en' => Yii::t('app', 'ชื่อภาษาอังกฤษ'),
            'std_lname_en' => Yii::t('app', 'สกุลภาษาอังกฤษ'),
            'std_classroom' => Yii::t('app', 'ชั้นเรียน'),
            'std_roll_no' => Yii::t('app', 'เลขที่'),
            'std_classteacher' => Yii::t('app', 'อาจารย์ประจำชั้นเรียน'),
            'std_profile' => Yii::t('app', 'STD Profile'),
            'std_family' => Yii::t('app', 'STD FAMILY'),
            'std_education' => Yii::t('app', 'STD EDUCATION'),
        ];
    }

    public function getEducation(){
        return $this->hasOne(Education::className(),['std_education_id'=>'std_id']);
    }
    public function getFamilybio(){
        return $this->hasOne(Familybio::className(),['std_familybio_id'=>'std_id']);
    }
    public function getProfile(){
        return $this->hasOne(Profile::className(),['std_profile_id'=>'std_id']);
    }



    public function getFullname(){
        return $this->std_fname.' '.$this->std_lname;
    }

    public function getEducation_level(){
        return $this->education->std_education_level;
    }
    public function getEmail(){
        return $this->profile->std_profile_email;
    }
    public function getAddress(){
        return
            'บ้านเลขที่ '.$this->profile->std_profile_houseno.
            ' หมู่ '.$this->profile->std_profile_villageno.
            ' บ้าน'.$this->profile->std_profile_villagename.
            // ' ถนน'.$this->profile->std_profile_streetname.
            ' ตำบล'.$this->profile->std_profile_tambol.
            ' อำเภอ'.$this->profile->std_profile_amphur.
            ' จังหวัด'.$this->profile->std_profile_province.
            ' '.$this->profile->std_profile_zipcode;
    }

    public function getMygrade(){
        return ArrayHelper::getValue($this->getItemGrade(),$this->std_classroom);
    }
}
