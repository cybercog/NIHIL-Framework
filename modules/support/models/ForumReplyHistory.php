<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_reply_histories".
 *
 * @property integer $id
 * @property integer $reply_id
 * @property integer $user_id
 * @property string $date_created
 * @property string $content
 *
 * @property SupportForumReplies $reply
 * @property AcUsers $user
 */
class ForumReplyHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_reply_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reply_id', 'user_id', 'date_created', 'content'], 'required'],
            [['reply_id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['content'], 'string']
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
            'date_created' => 'Date Created',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReply()
    {
        return $this->hasOne(SupportForumReplies::className(), ['id' => 'reply_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
