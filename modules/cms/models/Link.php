<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_links".
 *
 * @property integer $id
 * @property string $short_code
 * @property string $label
 * @property string $url
 * @property string $date_created
 * @property string $date_expires
 * @property integer $clicks_expires
 * @property integer $clicks_total
 * @property string $date_last_click
 *
 * @property CmsLinksLogs[] $cmsLinksLogs
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_links';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_code', 'label', 'url', 'clicks_total', 'date_last_click'], 'required'],
            [['date_created', 'date_expires', 'date_last_click'], 'safe'],
            [['clicks_expires', 'clicks_total'], 'integer'],
            [['short_code'], 'string', 'max' => 32],
            [['label'], 'string', 'max' => 128],
            [['url'], 'string', 'max' => 255],
            [['short_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short_code' => 'Short Code',
            'label' => 'Label',
            'url' => 'Url',
            'date_created' => 'Date Created',
            'date_expires' => 'Date Expires',
            'clicks_expires' => 'Clicks Expires',
            'clicks_total' => 'Clicks Total',
            'date_last_click' => 'Date Last Click',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsLinksLogs()
    {
        return $this->hasMany(CmsLinksLogs::className(), ['link_id' => 'id']);
    }
}
