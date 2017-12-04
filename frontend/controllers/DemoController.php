<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Filedindex;


/**
 * Site controller
 */
class DemoController extends Controller
{
       public  function actionIndex(){
         return  $this->render('index');
       }
       public  function actionAdd(){
           return  $this->render('add');
       }
       //添加
       public  function actionAa(){
           $res = Yii::$app->request->post();
           $user = new  FiledIndex();
           $Post =  $user->test($res);
           if($Post){
                 return $this->redirect(['demo/show']);
           }else{
                echo "<script> alert('添加失败')</script>";
           }
       }
       //展示
       public  function actionShow(){
           $user = new  FiledIndex();
           $data=  $user->show($user);
           return $this->render('index',['data'=>$data]);
       }
       //删除
       public  function actionDell(){
           $id= Yii::$app->request->get('id');
           $user = new  FiledIndex();
           $data=  $user->dell($id);
           if($data){
               return $this->redirect(['demo/show']);
           }else{
               echo "<script> alert('删除失败');</script>";
           }
       }
       //修改
       public  function actionUpdate(){
           $id= Yii::$app->request->get('id');
           $user = new  FiledIndex();
           $data=  $user->update($id);
           return $this->render('update',['data'=>$data]);
       }
    //修改
       public  function actionUpdates(){
           $res = Yii::$app->request->post();
           $user = new  FiledIndex();
           $data=  $user->updates($res);
           if($data){
               return $this->redirect(['demo/show']);
           }
       }
}