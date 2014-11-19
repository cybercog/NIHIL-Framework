<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_invoice_items".
 *
 * @property integer $id
 * @property integer $invoice_id
 * @property string $name
 * @property integer $quantity
 * @property string $unit_price
 * @property string $total
 * @property integer $taxed
 * @property string $description
 * @property string $details
 *
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
            [['invoice_id', 'name', 'quantity', 'unit_price', 'total', 'taxed', 'description'], 'required'],
            [['invoice_id', 'quantity', 'taxed'], 'integer'],
            [['name', 'description', 'details'], 'string'],
            [['unit_price', 'total'], 'number']
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
    public function getInvoice()
    {
        return $this->hasOne(EcomInvoices::className(), ['id' => 'invoice_id']);
    }
}
