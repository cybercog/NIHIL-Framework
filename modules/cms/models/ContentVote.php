<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_content_votes".
 *
 * @property integer $id
 * @property integer $content_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $vote
 */
class ContentVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_content_votes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'user_id', 'timestamp', 'vote'], 'required'],
            [['content_id', 'user_id'], 'integer'],
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
            'content_id' => 'Content ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'vote' => 'Vote',
        ];
    }
}
