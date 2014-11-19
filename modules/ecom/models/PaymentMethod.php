<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_payment_methods".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $description
 *
 * @property PaymentMethod $parent0
 * @property PaymentMethod[] $paymentMethods
 * @property EcomPayments[] $ecomPayments
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_payment_methods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100]
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
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethods()
    {
        return $this->hasMany(PaymentMethod::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomPayments()
    {
        return $this->hasMany(EcomPayments::className(), ['payment_method_id' => 'id']);
    }
}
