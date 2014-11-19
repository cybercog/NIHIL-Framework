<?php

namespace app\modules\domains\models;

use Yii;

/**
 * This is the model class for table "domains_registered".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $customer_id
 * @property integer $tld_id
 * @property string $name
 * @property string $date_created
 * @property string $date_registered
 * @property string $date_expires
 *
 * @property EcomCustomers $customer
 * @property DomainsTlds $tld
 */
class RegisteredDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domains_registered';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'customer_id', 'tld_id'], 'integer'],
            [['customer_id', 'tld_id', 'name', 'date_created', 'date_registered', 'date_expires'], 'required'],
            [['date_created', 'date_registered', 'date_expires'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'customer_id' => 'Customer ID',
            'tld_id' => 'Tld ID',
            'name' => 'Name',
            'date_created' => 'Date Created',
            'date_registered' => 'Date Registered',
            'date_expires' => 'Date Expires',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(EcomCustomers::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTld()
    {
        return $this->hasOne(DomainsTlds::className(), ['id' => 'tld_id']);
    }
}
