<?php

namespace app\modules\ac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ac\models\PasswordChanges;

/**
 * PasswordChangesSearch represents the model behind the search form about `app\modules\ac\models\PasswordChanges`.
 */
class PasswordChangesSearch extends PasswordChanges
{
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['hash', 'date_created', 'date_expires', 'ip_address', 'user_agent'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PasswordChanges::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_expires' => $this->date_expires,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'user_agent', $this->user_agent]);

        return $dataProvider;
    }
}
