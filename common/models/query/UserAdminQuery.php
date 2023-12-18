<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\UserAdmin]].
 *
 * @see \common\models\UserAdmin
 */
class UserAdminQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\UserAdmin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\UserAdmin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
