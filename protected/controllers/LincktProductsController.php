<?php

class LincktProductsController extends Controller
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
				'actions'=>array('create','update','admin','delete','porder', 'ProdUnit', 'UnitPrice','loadImage'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Admin"))'
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin',),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'		//------------------------------------
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

        
         Public function actionloadImage($id)
		    {
		        $model=$this->loadModel($id);
	
		        header('Content-Type: ' . $model->fileType);
		        print $model->p_pic;
	
		    }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new LincktProducts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LincktProducts']))
		{
			$model->attributes=$_POST['LincktProducts'];
			if($model->save())
                            
                             //logs
                            $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Product: <a href=/Linckt/index.php?r=lincktProducts/view&id=". $model->id . ">" . $model->products_pcode . "</a> has been added";
				$logC->dateTime= date('Y-m-d H:i:s');
				$logC->save();
                            
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['LincktProducts']))
		{
                    
                     $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "Updated an Product information: <a href=/Linckt/index.php?r=lincktProducts/view&id=". $model->pcode . ">" . $model->ProductName . "</a>";
			$logU->dateTime= date('Y-m-d H:i:s');
                        
			$model->attributes=$_POST['LincktProducts'];
			if($model->save()&& $logU->save())
				$this->redirect(array('view','id'=>$model->id));
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

                $model=$this->loadModel($id);
                //Logs
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
                       $logU->description= "A Product Has been Remove <b>" .$model->ProductName ."</b>"  ;

			$logU->dateTime= date('Y-m-d H:i:s');
                
                $logU->save();
                
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LincktProducts');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LincktProducts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LincktProducts']))
			$model->attributes=$_GET['LincktProducts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LincktProducts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LincktProducts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LincktProducts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='linckt-products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function actionProdUnit()
	{
		
		//$qwe = Yii::app()->getRequest()->getParam('bap_church');//-----------------------------
		$sql=Productunit::model()->findAll('pcode=:parent_id',array(':parent_id'=>(string)$_GET['products_pcode']));
		//print_r($sql);
                //print_r((string)$_GET['products_pcode']);
		$data=CHtml::listData($sql,'id','productunit');
		//$data1=(string)$_GET['bap_church'];
		//echo CHtml::tag('input', array( 'type'=>'text' , 'value' => $data1));
		foreach($data as $value=>$name)
		{
			//print_r($value);
                        echo CHtml::tag('option',
                            array('value'=>$value),CHtml::encode($name),true);
                                    
				//echo $value;
				//echo $name;
			/*echo CHtml::tag('input',
                array('type'=>'text','value'=>$value),CHtml::encode($name),true);*/
		}
	}
        
        public function actionUnitPrice()
	{
		
		//$qwe = Yii::app()->getRequest()->getParam('bap_church');//-----------------------------
		$sql=Productunit::model()->findAll('id=:parent_id',array(':parent_id'=>(string)$_GET['productunit_id']));
		//print_r($sql);
                //print_r((string)$_GET['products_pcode']);
		$data=CHtml::listData($sql,'productunitprice','productunitprice');
		//$data1=(string)$_GET['bap_church'];
		//echo CHtml::tag('input', array( 'type'=>'text' , 'value' => $data1));
		foreach($data as $value=>$name)
		{
//			print_r($value);
//                        echo CHtml::tag('option',
//                            array('value'=>$value),CHtml::encode($name),true);
//                                    
				echo $value;
				//echo $name;
			/*echo CHtml::tag('input',
                array('type'=>'text','value'=>$value),CHtml::encode($name),true);*/
		}
	}
}
