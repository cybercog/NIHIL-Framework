<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `app\modules\ecom\models\Contact`.
 */
class ContactSearch extends Contact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'user_id'], 'integer'],
            [['first', 'middle', 'last', 'suffix', 'company', 'email', 'phone', 'address1', 'address2', 'address3', 'city', 'state', 'zipcode', 'country', 'date_created', 'date_confirmed', 'date_last_used', 'details'], 'safe'],
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
        $query = Contact::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_confirmed' => $this->date_confirmed,
            'date_last_used' => $this->date_last_used,
        ]);

        $query->andFilterWhere(['like', 'first', $this->first])
            ->andFilterWhere(['like', 'middle', $this->middle])
            ->andFilterWhere(['like', 'last', $this->last])
            ->andFilterWhere(['like', 'suffix', $this->suffix])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'address3', $this->address3])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
