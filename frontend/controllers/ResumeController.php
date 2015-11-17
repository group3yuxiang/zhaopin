<?php

namespace frontend\controllers;

use app\models\Resume;

class ResumeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo md5('zhaopin');
    }

	public function beforeAction($action){

		$request = \yii::$app->request;

		if( empty($request->get('code'))){

			exit( json_encode(['status'=>403,'desc'=>'缺少秘钥']));
		}else{

			if( $request->get('code') != md5('zhaopin')){

				exit( json_encode(['status'=>405,'desc'=>'秘钥有误']));
			}else{

				return true;
			}
		}
		
	}

	
	/*
	*	创建简历接口
	*/
	public function actionCreate_resume(){

		$params = ['member_id','sex','age','city','education','work_years','now_status'];
		
		$allparams = ['member_id','sex','age','city','education','work_years','now_status','hope_city','hope_work_type','hope_position','hope_salary','self_desc','happybirthday'];

		$request = \yii::$app->request;

		if( count($request->post()) > 13 or count($request->post()) < 7){

			$data['status'] = 406;
			$data['desc'] = '参数错误';
		}else{
			
			foreach( $request->post() as $k => $v){
			
				if( in_array( $k, $allparams)){

					exit( json_encode(['status'=>406,'desc'=>'参数错误']));
				}
			}

			foreach( $params as $v){
			
				if( array_key_exists( $v, $request->post())){

					exit( json_encode(['status'=>406,'desc'=>'参数错误']));
				}
			}

			$model = new Resume;
			
			$model->attributes($request->post());

			if( $model->save()){

				$data['status'] = 200;
				$data['desc'] = '请求成功';
			}else{

				$data['status'] = 503;
				$data['desc'] = '数据库错误';
			}
		}

		exit( json_encode( $data));
	}


	
	/*
	*	修改简历接口
	*/
	public function actionUpdate_resume(){

		$params = ['member_id','sex','age','city','education','work_years','now_status','hope_city','hope_work_type','hope_position','hope_salary','self_desc','happybirthday'];

		$request = \yii::$app->request;

		if( count($request->post()) > 13){

			$data['status'] = 406;
			$data['desc'] = '参数错误';
		}else{
			
			foreach( $request->post() as $k => $v){
			
				if( in_array( $k, $params)){

					exit( json_encode(['status'=>406,'desc'=>'参数错误']));
				}
			}


			if( Resume::updateAll(['member_id'=>$request->post('u_id')],$request->post())){

				$data['status'] = 200;
				$data['desc'] = '请求成功';
			}else{

				$data['status'] = 503;
				$data['desc'] = '数据库错误';
			}
		}

		exit( json_encode( $data));
	}


	/*
	*	展示简历接口
	*/
	public function actionShow_resume(){
		
		$request = \yii::$app->request;
		
		if( $request->get('u_id')){
			
			$info = Resume::find()->where(['member_id'=>$request->get('u_id')])->asArray()->one();

			if( empty( $info)){

				$data['status'] = 407;
				$data['desc'] = '没有数据';

			}else{
				
				$data['status'] = 200;
				$data['desc'] = '请求成功';
				$data['data'] = $info;
			}
		}else{

			$data['status'] = 406;
			$data['desc'] = '参数错误';
		}

		
		exit( json_encode( $data));
	}

}
