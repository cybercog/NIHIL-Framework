<?php

namespace app\modules\ac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ac\models\Users;

/**
 * UsersSearch represents the model behind the search form about `app\modules\ac\models\Users`.
 */
class UsersSearch extends Users
{
    public function rules()
    {
        return [
            [['id', 'login_attempts'], 'integer'],
            [['username', 'email', 'password', 'nickname', 'birthday', 'auth_key', 'date_created', 'date_last_login', 'last_login_ip', 'details'], 'safe'],
            [['credit'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Users::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'credit' => $this->credit,
            'date_created' => $this->date_created,
            'date_last_login' => $this->date_last_login,
            'login_attempts' => $this->login_attempts,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'last_login_ip', $this->last_login_ip])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
