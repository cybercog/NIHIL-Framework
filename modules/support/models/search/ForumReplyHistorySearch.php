<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\ForumReplyHistory;

/**
 * ForumReplyHistorySearch represents the model behind the search form about `app\modules\support\models\ForumReplyHistory`.
 */
class ForumReplyHistorySearch extends ForumReplyHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reply_id', 'user_id'], 'integer'],
            [['date_created', 'content'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = static::find();

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
            'date_created' => $this->date_created,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
