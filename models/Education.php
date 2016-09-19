<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_student_educationbio".
 *
 * @property integer $std_education_id
 * @property string $std_education_level
 * @property string $std_education_academy
 * @property string $std_education_qualification
 * @property integer $std_education_graduationyear
 * @property string $std_education_gpa
 * @property string $std_education_address
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_student_educationbio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_education_graduationyear'], 'integer'],
            [['std_education_level', 'std_education_qualification'], 'string', 'max' => 50],
            [['std_education_academy', 'std_education_address'], 'string', 'max' => 255],
            [['std_education_gpa'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_education_id' => Yii::t('app', 'Std Education ID'),
            'std_education_level' => Yii::t('app', 'ระดับการศึกษาเดิม'),
            'std_education_academy' => Yii::t('app', 'สถานศึกษาเดิม'),
            'std_education_qualification' => Yii::t('app', 'วุฒิการศึกษาเดิม'),
            'std_education_graduationyear' => Yii::t('app', 'สำเร็จการศึกษาเมื่อปี'),
            'std_education_gpa' => Yii::t('app', 'เกรดเฉลี่ยที่สำเร็จการศึกษา'),
            'std_education_address' => Yii::t('app', 'ที่อยูสถานศึกษาเดิม'),
        ];
    }
}
