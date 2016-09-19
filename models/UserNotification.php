<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_notification".
 *
 * @property integer $user_notification_id
 * @property string $user_notification_title
 * @property string $user_notification_data
 * @property string $user_notification_img
 */
class UserNotification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_notification_title'], 'string', 'max' => 100],
            [['user_notification_data', 'user_notification_img'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_notification_id' => 'Notification Primary Key',
            'user_notification_title' => 'Notification Primary Title',
            'user_notification_data' => 'Notification Primary Data',
            'user_notification_img' => 'Notification Primary Img',
        ];
    }
}
