<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ecom\models\ProductAttribute;
use app\modules\ecom\models\Invoice;

/**
 * This is the model class for table "ecom_invoice_items".
 *
 * @property integer $id
 * @property integer $invoice_id
 * @property integer $product_attribute_id
 * @property string $name
 * @property integer $quantity
 * @property string $unit_price
 * @property string $total
 * @property integer $taxed
 * @property string $description
 * @property string $details
 *
 * @property EcomProducts $product
 * @property EcomInvoices $invoice
 */
class InvoiceItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoice_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'product_attribute_id', 'quantity', 'taxed'], 'integer'],
            [['unit_price', 'total'], 'number'],
            [['description', 'details'], 'string'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'product_attribute_id' => 'Product Attribute ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'total' => 'Total',
            'taxed' => 'Taxed',
            'description' => 'Description',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttribute()
    {
        return $this->hasOne(ProductAttribute::className(), ['id' => 'product_attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }
}
