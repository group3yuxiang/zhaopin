<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industry".
 *
 * @property integer $id
 * @property string $industry_name
 * @property integer $pid
 * @property integer $level
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'level'], 'integer'],
            [['industry_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'industry_name' => 'Industry Name',
            'pid' => 'Pid',
            'level' => 'Level',
        ];
    }
}
