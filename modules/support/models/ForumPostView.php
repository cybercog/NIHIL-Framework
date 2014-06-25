<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_post_views".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 */
class ForumPostView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_post_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'timestamp', 'ip_address', 'user_agent'], 'required'],
            [['post_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['ip_address'], 'string', 'max' => 64],
            [['user_agent'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'timestamp' => 'Timestamp',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }
}
