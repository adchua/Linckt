<?php

class PurchaseOrderlineController extends Controller
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
				'actions'=>array('create','update','admin','delete','porder', 'ProdUnit', 'UnitPrice'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Admin"))'
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','porder', 'ProdUnit', 'UnitPrice',),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'		//------------------------------------
			),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','ProdUnitLink', 'UnitPriceLink','delete',),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Client"))'		//------------------------------------
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

          public function actionPorder()
	{
            $model=new Users;
            
            if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('clientCompany/create','id'=>$model->id));
		}
            
            $this->render('_form2',array(
			'model'=>$model,
		));
        }
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PurchaseOrderline;
                //$model1=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PurchaseOrderline']))
		{
			$model->attributes=$_POST['PurchaseOrderline'];
			if($model->save())
                            
                              //Logss
                          $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Order: <a href=/Linckt/index.php?r=purchaseOrder/view&id=".$model->id .">" . $model->productunit . "</a> has been added";
				$logC->dateTime= date('Y-m-d H:i:s');
				$logC->save();
                            
                             if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" ){
				$this->redirect(array('purchaseOrder/index'));
                             }else{
                                 $this->redirect(array('users/view','id'=>Yii::app()->user->id));
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

		if(isset($_POST['PurchaseOrderline']))
		{
			$model->attributes=$_POST['PurchaseOrderline'];
			if($model->save())
				$this->redirect(array('purchaseOrder/view','id'=>$model->id));
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('lincktProducts/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PurchaseOrderline');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PurchaseOrderline('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrderline']))
			$model->attributes=$_GET['PurchaseOrderline'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PurchaseOrderline the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
           
            
		$model=PurchaseOrderline::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        
        
       
	/**
	 * Performs the AJAX validation.
	 * @param PurchaseOrderline $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchase-orderline-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionProdUnit()
	{
		
		$sql=Productunit::model()->findAll('pcode=:parent_id',array(':parent_id'=>(string)$_GET['products_pcode']));
		$data=CHtml::listData($sql,'id','productunit');
		foreach($data as $value=>$name)
		{
                        echo CHtml::tag('option',
                            array('value'=>$value),CHtml::encode($name),true);
		}
	}
        
        public function actionUnitPrice()
	{
            
		
		$sql=Productunit::model()->findAll('id=:parent_id',array(':parent_id'=>(string)$_GET['productunit']));
		
		
                foreach($sql as $value1)
		{
				echo $value1->productunitprice;
		}
	}
        
        
        ///////////////////////////////////////////////FOR Client///////////////////////////////
         public function actionProdUnitLink()
	{
            
            
		
		$sql=LincktProducts::model()->findAll('products_pcode=:parent_id',array(':parent_id'=>(string)$_GET['products_pcode']));
		$data=CHtml::listData($sql,'productunit_id','UnitType');
                
		foreach($data as $value=>$name)
		{
                        echo CHtml::tag('option',
                            array('value'=>$value),CHtml::encode($name),true);
		}
	}
        
        public function actionUnitPriceLink()
	{
		$sql=LincktProducts::model()->findAll('productunit_id=:parent_id',array(':parent_id'=>(string)$_GET['productunit']));
		
		$data=CHtml::listData($sql,'linckt_unitprice','linckt_unitprice');
		
		foreach($data as $value=>$name)
		{
				echo $value;
		}
	}
      
       
    }

