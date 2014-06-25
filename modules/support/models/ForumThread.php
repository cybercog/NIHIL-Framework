<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_threads".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $slug
 * @property integer $posts_count
 */
class ForumThread extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_threads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'name', 'slug', 'posts_count'], 'required'],
            [['parent', 'posts_count'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'name' => 'Name',
            'slug' => 'Slug',
            'posts_count' => 'Posts Count',
        ];
    }
}
