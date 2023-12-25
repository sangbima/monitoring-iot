<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Packages;

/**
 * PackagesSearch represents the model behind the search form of `common\models\Packages`.
 */
class PackagesSearch extends Packages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sensor_count', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['uuid', 'package_name'], 'safe'],
            [['price'], 'number'],
            [['highlight'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Packages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sensor_count' => $this->sensor_count,
            'price' => $this->price,
            'highlight' => $this->highlight,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'uuid', $this->uuid])
            ->andFilterWhere(['ilike', 'package_name', $this->package_name]);

        return $dataProvider;
    }
}
