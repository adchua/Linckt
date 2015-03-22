<?php

class PurchaseOrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Admin"))'
			),
                          array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Supplier"))'
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'
			),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Client"))'
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

        
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PurchaseOrder;
                
              
                                
                                
                if(isset($_POST['PurchaseOrder']))
		{
			$model->attributes=$_POST['PurchaseOrder'];
                        
                       
              if($model->save()){
                  
                    //Logss
                          $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Order: <a href=/Linckt/index.php?r=purchaseOrder/view&id=".$model->id .">" . $model->status . "</a> has been added";
				$logC->dateTime= date('Y-m-d H:i:s');
				$logC->save();
                  if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular"||Yii::app()->user->type==="Supplier" ){
			$this->redirect(array('view','id'=>$model->id));
                        
                  }else{
                      $this->redirect(array('users/view','id'=>Yii::app()->user->id));
                  }
			}
		}
                
                $this->render('create',array(
			'model'=>$model,
			
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PurchaseOrder']))
		{
                    //Logs
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "Updated an Order information: <a href=/Linckt/index.php?r=purchaseOrder/view&id=". $model->id . ">" . $model->status . "</a>";
			$logU->dateTime= date('Y-m-d H:i:s');
                        
                    
			$model->attributes=$_POST['PurchaseOrder'];
			if($model->save()&& $logU->save())
				$this->redirect(array('purchaseOrder/index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
                

                //Logs
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "A Order Has been Remove";
			$logU->dateTime= date('Y-m-d H:i:s');
                
                $logU->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
                    if(Yii::app()->user->type==="Client") {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('users/view','id'=>Yii::app()->user->id));
                    }else{
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                    }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
           $criteria=new CDbCriteria;
            $criteria->alias = 'PurchaseOrder';
            $criteria->join='INNER JOIN Users ON Users.id=PurchaseOrder.client_id';
            $criteria->condition='Users.usertype="Admin" OR Users.usertype="Regular" ';
 
            
             if( Yii::app()->user->type==="Supplier" ) {
		$dataProvider=new CActiveDataProvider('PurchaseOrder', array(
                'criteria'=>$criteria,
    ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
             }else{
                 $dataProvider=new CActiveDataProvider('PurchaseOrder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                    ));
             }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PurchaseOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PurchaseOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PurchaseOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PurchaseOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchase-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
