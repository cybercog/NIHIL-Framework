<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_comment_votes".
 *
 * @property integer $id
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $vote
 *
 * @property CmsComments $comment
 * @property AcUsers $user
 */
class CommentVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_comment_votes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id', 'timestamp', 'vote'], 'required'],
            [['comment_id', 'user_id'], 'integer'],
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
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'vote' => 'Vote',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(CmsComments::className(), ['id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
