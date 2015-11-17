<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property integer $id
 * @property string $position_name
 * @property integer $pid
 * @property integer $level
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'level'], 'integer'],
            [['position_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_name' => 'Position Name',
            'pid' => 'Pid',
            'level' => 'Level',
        ];
    }
}
