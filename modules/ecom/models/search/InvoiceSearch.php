<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `app\modules\ecom\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invoice_status_id', 'customer_id', 'shipping_id', 'payment_id'], 'integer'],
            [['invoice_number', 'date_created', 'date_due', 'date_paid', 'token', 'details'], 'safe'],
            [['subtotal', 'shipping', 'credit', 'tax', 'tax_rate', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Invoice::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'invoice_status_id' => $this->invoice_status_id,
            'customer_id' => $this->customer_id,
            'shipping_id' => $this->shipping_id,
            'payment_id' => $this->payment_id,
            'date_created' => $this->date_created,
            'date_due' => $this->date_due,
            'date_paid' => $this->date_paid,
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'credit' => $this->credit,
            'tax' => $this->tax,
            'tax_rate' => $this->tax_rate,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'invoice_number', $this->invoice_number])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
