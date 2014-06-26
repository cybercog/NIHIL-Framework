<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\PageView;

/**
 * PageViewSearch represents the model behind the search form about `app\modules\cms\models\PageView`.
 */
class PageViewSearch extends PageView
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'user_id'], 'integer'],
            [['timestamp', 'ip_address', 'user_agent'], 'safe'],
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
        $query = PageView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'page_id' => $this->page_id,
            'user_id' => $this->user_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'user_agent', $this->user_agent]);

        return $dataProvider;
    }
}
