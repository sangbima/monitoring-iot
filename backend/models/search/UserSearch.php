<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;
use Yii;

/**
 * UserAdminSearch represents the model behind the search form of `backend\models\UserAdmin`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'fullname', 'auth_key', 'password_hash', 'password_reset_token', 'verification_token'], 'safe'],
            [['is_change_password'], 'boolean'],
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
        $query = User::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_change_password' => $this->is_change_password,
        ]);

        $query->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'fullname', $this->fullname])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'password_hash', $this->password_hash])
            ->andFilterWhere(['ilike', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['ilike', 'verification_token', $this->verification_token]);

        return $dataProvider;
    }
}
