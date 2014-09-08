<?php

namespace app\modules\pda\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pda\models\Email;

/**
 * EmailSearch represents the model behind the search form about `app\modules\pda\models\Email`.
 */
class EmailSearch extends Email
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contact_id', 'user_id', 'views'], 'integer'],
            [['token', 'date_sent', 'date_first_opened', 'subject', 'content', 'date_last_view'], 'safe'],
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
        $query = Email::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'contact_id' => $this->contact_id,
            'user_id' => $this->user_id,
            'date_sent' => $this->date_sent,
            'date_first_opened' => $this->date_first_opened,
            'date_last_view' => $this->date_last_view,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
