<?php

namespace common\modules\queuemanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use direct\modules\direct\models\Task;

/**
 * TaskSearch represents the model behind the search form about `direct\modules\direct\models\Task`.
 */
class TaskSearch extends \common\modules\queuemanager\models\Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid'], 'integer'],
            [['name', 'status', 'job_name', 'command', 'created', 'updated', 'queue', 'exchange', 'tag'], 'safe'],
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
        $query = TaskSearch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
//                'defaultOrder' => [
//                    'created_at' => SORT_DESC,
//
//                ]
            ],
        ]);




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'key' => $this->key,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'job_name', $this->job_name])
            ->andFilterWhere(['like', 'command', $this->command])
            ->andFilterWhere(['like', 'queue', $this->queue])
            ->andFilterWhere(['like', 'exchange', $this->exchange])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
