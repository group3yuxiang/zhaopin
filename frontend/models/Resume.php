<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property integer $resume_id
 * @property integer $member_id
 * @property string $sex
 * @property string $education
 * @property string $work_years
 * @property string $now_status
 * @property integer $hope_city
 * @property integer $hope_work_type
 * @property string $hope_position
 * @property string $hope_salary
 * @property string $self_desc
 * @property string $happybirthday
 * @property string $age
 * @property string $city
 * @property string $c_img
 * @property string $c_fujian
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'hope_city', 'hope_work_type'], 'integer'],
            [['self_desc'], 'string'],
            [['sex', 'happybirthday'], 'string', 'max' => 12],
            [['education', 'age'], 'string', 'max' => 10],
            [['work_years', 'now_status', 'hope_position', 'hope_salary', 'city'], 'string', 'max' => 30],
            [['c_img', 'c_fujian'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_id' => 'Resume ID',
            'member_id' => 'Member ID',
            'sex' => 'Sex',
            'education' => 'Education',
            'work_years' => 'Work Years',
            'now_status' => 'Now Status',
            'hope_city' => 'Hope City',
            'hope_work_type' => 'Hope Work Type',
            'hope_position' => 'Hope Position',
            'hope_salary' => 'Hope Salary',
            'self_desc' => 'Self Desc',
            'happybirthday' => 'Happybirthday',
            'age' => 'Age',
            'city' => 'City',
            'c_img' => 'C Img',
            'c_fujian' => 'C Fujian',
        ];
    }
}
