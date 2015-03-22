<?php

class PaymentReceiptController extends Controller
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
				'actions'=>array('create','update','admin','delete','PopulateOr','loadImage'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Admin"))'
			),
                         
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','PopulateOr','loadImage'),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'		//------------------------------------
			),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update','loadImage'),
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
		$model=new PaymentReceipt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

//		if(isset($_POST['PaymentReceipt']))
//		{
//                    
//                    
//                    
//			$model->attributes=$_POST['PaymentReceipt'];
//			if($model->save())
//                            
//                             //logs
//                            $logC=new Logs;
//				$logC->emp_id= Yii::app()->user->id;
//				$logC->description= "Created an Payment: <a href=/Linckt/index.php?r=paymentReceipt/view&id=". $model->id . ">" . $model->ClientCompany->companyname . "</a> has been added";
//				$logC->dateTime= date('Y-m-d H:i:s');
//				$logC->save();
//                            
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
                
                
                
                if(isset($_POST['PaymentReceipt']))
			{
			$model->attributes=$_POST['PaymentReceipt'];
	
	                        if(!empty($_FILES['PaymentReceipt']['tmp_name']['py_pic']))
		            {
		                $file = CUploadedFile::getInstance($model,'py_pic');
	                //$model->med_descxray = $file->name;
                                
                                //logs
                            $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Payment: <a href=/Linckt/index.php?r=paymentReceipt/view&id=". $model->id . ">" . $model->ClientCompany->companyname . "</a> has been added";
				$logC->dateTime= date('Y-m-d H:i:s');
				$logC->save();
                                
                               //for the picture   
		                $model->fileType = $file->type;
		                $fp = fopen($file->tempName, 'r');
		                $content = fread($fp, filesize($file->tempName));
		                fclose($fp);
		                $model->py_pic = $content;
		            }
                    
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        Public function actionloadImage($id)
		    {
		        $model=$this->loadModel($id);
	
		        header('Content-Type: ' . $model->fileType);
		        print $model->py_pic;
	
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

//		if(isset($_POST['PaymentReceipt']))
//		{
//                    
//                     $logU=new Logs;
//			$logU->emp_id= Yii::app()->user->id;
//			$logU->description= "Updated an Payment information: <a href=/Linckt/index.php?r=paymentReceipt/view&id=". $model->id . ">" . $model->ClientCompany->companyname . "</a>";
//			$logU->dateTime= date('Y-m-d H:i:s');
//                        
//			$model->attributes=$_POST['PaymentReceipt'];
//			if($model->save()&& $logU->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
                
                if(isset($_POST['PaymentReceipt']))
		{
                    
                        $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "Updated an Payment information: <a href=/Linckt/index.php?r=paymentReceipt/view&id=". $model->id . ">" . $model->ClientCompany->companyname . "</a>";
			$logU->dateTime= date('Y-m-d H:i:s');
                    
			$model->attributes=$_POST['PaymentReceipt'];
                        
                      
	                          if(!empty($_FILES['PaymentReceipt']['tmp_name']['py_pic']))
	            {
		                $file = CUploadedFile::getInstance($model,'py_pic');
	                //$model->med_descxray = $file->name;
		                $model->fileType = $file->type;
		                $fp = fopen($file->tempName, 'r');
		                $content = fread($fp, filesize($file->tempName));
		                fclose($fp);
		                $model->py_pic = $content;
                                
                       
		            }
			
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
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                
                
                $model=$this->loadModel($id);
                //Logs
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
                       $logU->description= "A Payment Has been Remove: <b>" .$model->ClientCompany->companyname ."</b>"  ;

			$logU->dateTime= date('Y-m-d H:i:s');
                        
               
                $logU->save();
                 $this->loadModel($id)->delete();
                
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PaymentReceipt');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PaymentReceipt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PaymentReceipt']))
			$model->attributes=$_GET['PaymentReceipt'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PaymentReceipt the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PaymentReceipt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PaymentReceipt $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payment-receipt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function actionPopulateOr()
	{
             $id = (int)$_GET['client_company_id'];
             $criteria=new CDbCriteria ();
            $criteria->alias = 'PurchaseOrder';
            $criteria->join='INNER JOIN Users ON Users.id = PurchaseOrder.client_id INNER JOIN ClientCompany ON ClientCompany.id = Users.company_id';
            $criteria->condition='ClientCompany.id ='.$id.' AND Users.usertype="Client"';
		
		$sql=purchaseOrder::model()->findAll($criteria);
		$data=CHtml::listData($sql,'id','id');
		foreach($data as $value=>$name)
		{
                        echo CHtml::tag('option',
                            array('value'=>$value),CHtml::encode($name),true);
		}
	}
}
