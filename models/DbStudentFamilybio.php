<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_student_familybio".
 *
 * @property integer $std_familybio_id
 * @property string $std_familybio_parentcitizenship
 * @property string $std_familybio_parentname
 * @property string $std_familybio_parentsurname
 * @property string $std_familybio_parentjob
 * @property string $std_familybio_parentrelation
 * @property string $std_familybio_parentsalary
 */
class DbStudentFamilybio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_student_familybio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_familybio_parentcitizenship'], 'string', 'max' => 13],
            [['std_familybio_parentname', 'std_familybio_parentsurname'], 'string', 'max' => 50],
            [['std_familybio_parentjob'], 'string', 'max' => 30],
            [['std_familybio_parentrelation'], 'string', 'max' => 45],
            [['std_familybio_parentsalary'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_familybio_id' => Yii::t('app', 'Std Familybio ID'),
            'std_familybio_parentcitizenship' => Yii::t('app', 'เลขบัตรประชาชน'),
            'std_familybio_parentname' => Yii::t('app', 'ชื่อผู้ปกครอง'),
            'std_familybio_parentsurname' => Yii::t('app', 'นามสกุลผู้ปกครอง'),
            'std_familybio_parentjob' => Yii::t('app', 'อาชีพผู้ปกครอง'),
            'std_familybio_parentrelation' => Yii::t('app', 'ความสัมพันธ์'),
            'std_familybio_parentsalary' => Yii::t('app', 'รายได้ผู้ปกครอง'),
        ];
    }
}
