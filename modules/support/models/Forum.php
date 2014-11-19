<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forums".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $date-created
 * @property string $description
 *
 * @property SupportForumThreads[] $supportForumThreads
 * @property Forum $parent0
 * @property Forum[] $forums
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['name', 'date-created', 'description'], 'required'],
            [['date-created'], 'safe'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150]
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
            'date-created' => 'Date Created',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumThreads()
    {
        return $this->hasMany(SupportForumThreads::className(), ['forum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Forum::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForums()
    {
        return $this->hasMany(Forum::className(), ['parent' => 'id']);
    }
}
