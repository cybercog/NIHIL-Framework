<?php

namespace app\modules\ac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ac\models\AuthKeys;

/**
 * AuthKeysSearch represents the model behind the search form about `app\modules\ac\models\AuthKeys`.
 */
class AuthKeysSearch extends AuthKeys
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'type'], 'integer'],
            [['key', 'date_created', 'date_expires', 'date_used'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AuthKeys::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'date_created' => $this->date_created,
            'date_expires' => $this->date_expires,
            'date_used' => $this->date_used,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}
