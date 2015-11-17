<?php

namespace frontend\controllers;

use Yii;
use app\models\Region;
use app\models\WorkPosition;

use yii\web\Controller;

use yii\db\Query;

/**
 * RegionController implements the CRUD actions for Region model.
 */
class RegionController extends Controller
{
   //热门城市搜索
	public function actionRegion_show(){
		$request = \Yii::$app->request;
		$num = $request->get('nums');	
		if($num){
			$num=$request->get('nums');	
		}else{
			$num=10;
		}
		$mod =new Query;
		$info=$mod->select(['region_name'])->from('region')->limit($num)->all();
		$data=array(
			"status"=>0,
			"desc"=>"成功",
			"data"=>$info
		);
		$data1=array(
			"status"=>1,
			"desc"=>"失败",
			"data"=>''
		);
		//print_r($data);die;
		if($info){
			return json_encode($data);
		}else{
			return json_encode($data1);
		}
		

	}
   
   
   //省和城市列表
    public function actionRegion_list(){
        
        $list = Region::find()->where('parent_id=1')->asArray()->all();
        $regionList = array();
        $i = 1;
        foreach ( $list as $val ){
			//print_r($val);die;
            $regionList[$i][0] = $val;
            $regionList[$i]['child_region'] = region::find()->where('parent_id='.$val['region_id'])->asArray()->all();   $i++;
        }
        //print_r($regionList);die;
		$data=array(
			"status"=>0,
			"desc"=>"成功",
			"data"=>$regionList
		);
		$data1=array(
			"status"=>1,
			"desc"=>"失败",
			"data"=>''
		);
		//print_r($data);die;
		if($info){
			return json_encode($data);
		}else{
			return json_encode($data1);
		}
        
    }

	

	//根据城市搜索职位
	public function actionRegion_position(){
		$request = \Yii::$app->request;
		$city = $request->get('city');		
		$info = WorkPosition::find()->andFilterWhere(['like', 'working_place', $city])->asArray()->all();
		//print_r($info);
		$data=array(
			"status"=>0,
			"desc"=>"成功",
			"data"=>$info
		);
		$data1=array(
			"status"=>1,
			"desc"=>"失败",
			"data"=>''
		);
		//print_r($data);die;
		if($city){
			if($info){
				return json_encode($data);
			}else{
				return json_encode($data1);
			}
		}else{
			return json_encode($data1);
		}
		
		
	}
}
