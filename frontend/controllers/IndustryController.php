<?php

namespace frontend\controllers;
use app\models\Industry;
class IndustryController extends \yii\web\Controller
{
    /*
     * 行业信息列表
     */
    public function actionGetlist(){
        $request = \Yii::$app->request;
        if( $request->get('appid') != md5('zhaopin') ){
            $data['status'] = '103';
            $data['desc']   = '令牌错误';
            return json_encode($data);
        }
        $list = Industry::find()->where('pid=0')->asArray()->all();
        if($list){
            $industryList = array();
            $i = 0;
            foreach ( $list as $val ){
                $industryList[$i][0] = $val;
                $industryList[$i]['child_industry'] = Industry::find()->where('pid='.$val['id'])->asArray()->all();

                $i++;
            }
            $data['status'] = '200';
            $data['desc']   = '数据接收成功';
            $data['data']   = $industryList;
        }else{
            $data['status'] = '101';
            $data['desc']   = '数据未找到';
        }
        
        return json_encode($data);
       
        
    }
    
}
