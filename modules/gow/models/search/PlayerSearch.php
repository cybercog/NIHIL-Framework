<?php

namespace app\modules\gow\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gow\models\Player;

/**
 * PlayerSearch represents the model behind the search form about `app\modules\gow\models\Player`.
 */
class PlayerSearch extends Player
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'alliance_id'], 'integer'],
            [['rank', 'name', 'date_joined', 'date_updated'], 'safe'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'number'],
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
        $query = Player::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'alliance_id' => $this->alliance_id,
            'stone' => $this->stone,
            'wood' => $this->wood,
            'food' => $this->food,
            'ore' => $this->ore,
            'silver' => $this->silver,
            'date_joined' => $this->date_joined,
            'date_updated' => $this->date_updated,
        ]);

        $query->andFilterWhere(['like', 'rank', $this->rank])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
