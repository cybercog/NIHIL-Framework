<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_page_views".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 *
 * @property CmsPages $page
 * @property AcUsers $user
 */
class PageView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_page_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'timestamp', 'ip_address', 'user_agent'], 'required'],
            [['page_id', 'user_id'], 'integer'],
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
            'page_id' => 'Page ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(CmsPages::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
