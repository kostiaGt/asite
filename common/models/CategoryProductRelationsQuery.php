<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CategoryProductRelations]].
 *
 * @see CategoryProductRelations
 */
class CategoryProductRelationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CategoryProductRelations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryProductRelations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}