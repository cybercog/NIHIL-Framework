<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_reply_votes".
 *
 * @property integer $id
 * @property integer $reply_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $vote
 */
class ForumReplyVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_reply_votes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reply_id', 'user_id', 'timestamp', 'vote'], 'required'],
            [['reply_id', 'user_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['vote'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reply_id' => 'Reply ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'vote' => 'Vote',
        ];
    }
}
