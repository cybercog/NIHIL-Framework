<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\Link;

/**
 * LinkSearch represents the model behind the search form about `app\modules\cms\models\Link`.
 */
class LinkSearch extends Link
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clicks_expires', 'clicks_total'], 'integer'],
            [['short_code', 'label', 'url', 'date_created', 'date_expires', 'date_last_click'], 'safe'],
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
        $query = Link::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_created' => $this->date_created,
            'date_expires' => $this->date_expires,
            'clicks_expires' => $this->clicks_expires,
            'clicks_total' => $this->clicks_total,
            'date_last_click' => $this->date_last_click,
        ]);

        $query->andFilterWhere(['like', 'short_code', $this->short_code])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
