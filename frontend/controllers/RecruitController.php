<?php

namespace frontend\controllers;
use app\models\WorkPosition;
use yii\db\Query;
class RecruitController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /*
     * 获取最热招聘信息列表
     */
    public function actionRecruitmentinfo(){
        
        $request = \Yii::$app->request;
        if( $request->get('appid') != md5('zhaopin') ){
            $data['status'] = '103';
            $data['desc']   = 'appid错误';
            return json_encode($data);
        }
        $db = new Query;
        $list = $db->select(['id','position','company','pay','working_place'])->from('work_position')->andWhere(['is_hot'=>1])->all();
        if($list){
            $data['status'] = '200';
            $data['desc']   = '数据接收成功';
            $data['data']   = $list;
        }else{
            $data['status'] = '101';
            $data['desc']   = '数据未找到';
        }
        $type = !empty($request->get('datatype'))?$request->get('datatype'):'json';
        
        switch ($type){
            case 'json': return json_encode($data);break;
            default : return json_encode($data);
        }
       
    }

}
