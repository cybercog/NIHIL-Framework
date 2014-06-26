<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_post_votes".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $vote
 */
class PostVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_votes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'user_id', 'timestamp', 'vote'], 'required'],
            [['post_id', 'user_id'], 'integer'],
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
            'post_id' => 'Post ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'vote' => 'Vote',
        ];
    }
}
