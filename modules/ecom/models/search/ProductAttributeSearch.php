<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\ProductAttribute;

/**
 * ProductAttributeSearch represents the model behind the search form about `app\modules\ecom\models\ProductAttribute`.
 */
class ProductAttributeSearch extends ProductAttribute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'attribute_id', 'stock', 'user_inventoried', 'sold'], 'integer'],
            [['date_inventoried', 'date_last_sale', 'details'], 'safe'],
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
        $query = ProductAttribute::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'attribute_id' => $this->attribute_id,
            'stock' => $this->stock,
            'date_inventoried' => $this->date_inventoried,
            'user_inventoried' => $this->user_inventoried,
            'date_last_sale' => $this->date_last_sale,
            'sold' => $this->sold,
        ]);

        $query->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
