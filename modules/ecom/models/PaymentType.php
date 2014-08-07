<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_payment_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property EcomPayments[] $ecomPayments
 */
class PaymentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_payment_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomPayments()
    {
        return $this->hasMany(EcomPayments::className(), ['payment_type_id' => 'id']);
    }
}
