<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_shipping_addresses".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first
 * @property string $last
 * @property string $email
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $country
 * @property string $details
 *
 * @property EcomInvoices[] $ecomInvoices
 * @property EcomOrders[] $ecomOrders
 * @property AcUsers $user
 */
class ShippingAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_shipping_addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['details'], 'string'],
            [['first', 'last'], 'string', 'max' => 100],
            [['email', 'address1', 'address2', 'city'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 16],
            [['state', 'country'], 'string', 'max' => 2],
            [['zipcode'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first' => 'First',
            'last' => 'Last',
            'email' => 'Email',
            'phone' => 'Phone',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomInvoices()
    {
        return $this->hasMany(EcomInvoices::className(), ['shipping_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomOrders()
    {
        return $this->hasMany(EcomOrders::className(), ['shipping_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
