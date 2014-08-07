<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\modules\ecom\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'shipping_id', 'invoice_id', 'order_status_id', 'number_items'], 'integer'],
            [['order_number', 'date_created', 'date_processed', 'date_shipped', 'ip_address', 'details'], 'safe'],
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
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'shipping_id' => $this->shipping_id,
            'invoice_id' => $this->invoice_id,
            'order_status_id' => $this->order_status_id,
            'date_created' => $this->date_created,
            'date_processed' => $this->date_processed,
            'date_shipped' => $this->date_shipped,
            'number_items' => $this->number_items,
        ]);

        $query->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
