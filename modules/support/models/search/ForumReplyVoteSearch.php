<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\ForumReplyVote;

/**
 * ForumReplyVoteSearch represents the model behind the search form about `app\modules\support\models\ForumReplyVote`.
 */
class ForumReplyVoteSearch extends ForumReplyVote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reply_id', 'user_id'], 'integer'],
            [['timestamp', 'vote'], 'safe'],
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
        $query = ForumReplyVote::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'reply_id' => $this->reply_id,
            'user_id' => $this->user_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'vote', $this->vote]);

        return $dataProvider;
    }
}
