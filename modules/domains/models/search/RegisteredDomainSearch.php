<?php

namespace app\modules\domains\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\domains\models\RegisteredDomain;

/**
 * RegisteredDomainSearch represents the model behind the search form about `app\modules\domains\models\RegisteredDomain`.
 */
class RegisteredDomainSearch extends RegisteredDomain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'customer_id', 'tld_id'], 'integer'],
            [['name', 'date_created', 'date_registered', 'date_expires'], 'safe'],
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
        $query = RegisteredDomain::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'customer_id' => $this->customer_id,
            'tld_id' => $this->tld_id,
            'date_created' => $this->date_created,
            'date_registered' => $this->date_registered,
            'date_expires' => $this->date_expires,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
