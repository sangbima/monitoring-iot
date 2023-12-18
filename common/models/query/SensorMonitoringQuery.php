<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\SensorMonitoring]].
 *
 * @see \common\models\SensorMonitoring
 */
class SensorMonitoringQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\SensorMonitoring[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\SensorMonitoring|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
