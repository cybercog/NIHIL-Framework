<?php

namespace app\modules\domains\models;

use Yii;

/**
 * This is the model class for table "domains_tlds".
 *
 * @property integer $id
 * @property string $name
 * @property string $cost_register
 * @property string $cost_transfer
 * @property string $price_register
 * @property string $price_transfer
 * @property string $description
 * @property integer $order
 */
class Tld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domains_tlds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cost_register', 'cost_transfer', 'price_register', 'price_transfer', 'description'], 'required'],
            [['cost_register', 'cost_transfer', 'price_register', 'price_transfer'], 'number'],
            [['description'], 'string'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 32]
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
            'cost_register' => 'Cost Register',
            'cost_transfer' => 'Cost Transfer',
            'price_register' => 'Price Register',
            'price_transfer' => 'Price Transfer',
            'description' => 'Description',
            'order' => 'Order',
        ];
    }
}
