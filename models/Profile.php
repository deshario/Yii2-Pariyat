<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_student_profile".
 *
 * @property integer $std_profile_id
 * @property string $std_profile_birthdate
 * @property string $std_profile_weightheight
 * @property string $std_profile_email
 * @property string $std_profile_studyfund
 * @property string $std_profile_nationality
 * @property string $std_profile_religion
 * @property integer $std_profile_houseno
 * @property integer $std_profile_villageno
 * @property string $std_profile_villagename
 * @property string $std_profile_streetname
 * @property string $std_profile_tambol
 * @property string $std_profile_amphur
 * @property string $std_profile_province
 * @property string $std_profile_zipcode
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_student_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_profile_houseno', 'std_profile_villageno'], 'integer'],
            [['std_profile_birthdate', 'std_profile_email', 'std_profile_nationality', 'std_profile_religion'], 'string', 'max' => 50],
            [['std_profile_weightheight', 'std_profile_studyfund'], 'string', 'max' => 10],
            [['std_profile_villagename', 'std_profile_streetname', 'std_profile_tambol', 'std_profile_amphur', 'std_profile_province'], 'string', 'max' => 60],
            [['std_profile_zipcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_profile_id' => Yii::t('app', 'Std Profile ID'),
            'std_profile_birthdate' => Yii::t('app', 'วันเกิด'),
            'std_profile_weightheight' => Yii::t('app', 'น้ำหนัก / ส่วนสูง'),
            'std_profile_email' => Yii::t('app', 'อีเมล์'),
            'std_profile_studyfund' => Yii::t('app', 'การได้รับทุน'),
            'std_profile_nationality' => Yii::t('app', 'เชื้อชาติ'),
            'std_profile_religion' => Yii::t('app', 'ศาสนา'),
            'std_profile_houseno' => Yii::t('app', 'บ้านเลขที่'),
            'std_profile_villageno' => Yii::t('app', 'หมู่ที่'),
            'std_profile_villagename' => Yii::t('app', 'ชื่อหมู่บ้าน'),
            'std_profile_streetname' => Yii::t('app', 'ชื่อถนน'),
            'std_profile_tambol' => Yii::t('app', 'ตำบล'),
            'std_profile_amphur' => Yii::t('app', 'อำเภอ'),
            'std_profile_province' => Yii::t('app', 'จังหวัด'),
            'std_profile_zipcode' => Yii::t('app', 'รหัสไปรษณีย์'),
        ];
    }

}
