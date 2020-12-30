<?php 
   namespace app\controllers;
   
   use Yii;
   use yii\filters\AccessControl;
   use yii\web\Controller;
   use yii\web\Response;
   use yii\filters\VerbFilter;

class HhtestController extends Controller {
    
    public function actionIndex(){
      return $this->render('index');
    }
   
    public function actionMyresume(){
      return $this->render('myresume');
    }
    
    public function actionAddResume(){
      return $this->render('addresume');
    }
}
?>