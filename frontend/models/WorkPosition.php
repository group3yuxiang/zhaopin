<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_position".
 *
 * @property integer $id
 * @property string $position
 * @property string $company
 * @property string $pay
 * @property string $working_place
 * @property string $addtime
 * @property string $working_property
 * @property string $working_experience
 * @property string $education
 * @property string $title
 * @property string $job_responsibilities
 * @property string $company_Introduction
 */
class WorkPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addtime'], 'safe'],
            [['position', 'company', 'pay', 'working_place', 'working_property', 'working_experience', 'education', 'title', 'job_responsibilities', 'company_Introduction'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'company' => 'Company',
            'pay' => 'Pay',
            'working_place' => 'Working Place',
            'addtime' => 'Addtime',
            'working_property' => 'Working Property',
            'working_experience' => 'Working Experience',
            'education' => 'Education',
            'title' => 'Title',
            'job_responsibilities' => 'Job Responsibilities',
            'company_Introduction' => 'Company  Introduction',
        ];
    }
}
