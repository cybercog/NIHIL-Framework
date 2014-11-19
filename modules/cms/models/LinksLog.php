<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_links_logs".
 *
 * @property integer $id
 * @property integer $link_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $user_ip
 * @property string $user_agent
 *
 * @property CmsLinks $link
 * @property AcUsers $user
 */
class LinksLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_links_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_id', 'timestamp', 'user_ip', 'user_agent'], 'required'],
            [['link_id', 'user_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['user_ip'], 'string', 'max' => 128],
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
            'link_id' => 'Link ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'user_ip' => 'User Ip',
            'user_agent' => 'User Agent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(CmsLinks::className(), ['id' => 'link_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
