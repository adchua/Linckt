<?php

class UsersController extends Controller
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
				'actions'=>array('create','update','admin','delete','usertype','pdf','pdfuser','loadImage'),
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','usertype','pdf','pdfuser','loadImage'),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'		//------------------------------------
			),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
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
        
        Public function actionloadImage($id)
		    {
		        $model=$this->loadModel($id);
	
		        header('Content-Type: ' . $model->fileType);
		        print $model->py_pic;
	
		    }
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
        
        public function actionUserType()
	{
            $model=new Users;
            
            if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('clientCompany/create','id'=>$model->id));
		}
            
            $this->render('usertype',array(
			'model'=>$model,
		));
        }
        
        
        public function actionPdf($id)
	{
           
	$this->layout="//layouts/pdf";
       
		 $mPDF1 = Yii::app()->ePdf->mpdf();
		  $mPDF1->WriteHTML($this->render('pdfuser',array(
			'model'=>$this->loadModel($id),),true)
		);
		$mPDF1->Output();
		 
	
	}
        
        public function actionpdfuser($id)
	{
		$model=$this->loadModel($id);
	
		$this->render('pdfuser',array(
			'model'=>$this->loadModel($id),
		));
	}
        
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
                            
                            //logs
                            $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Users: <a href=/Linckt/index.php?r=users/view&id=". $model->id . ">" . $model->FullName . "</a> has been added";
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

		if(isset($_POST['Users']))
		{
                    
                    
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "Updated an user information: <a href=/Linckt/index.php?r=users/view&id=". $model->id . ">" . $model->FullName . "</a>";
			$logU->dateTime= date('Y-m-d H:i:s');
                        
			$model->attributes=$_POST['Users'];
			if($model->save()&& $logU->save())
                             if(Yii::app()->user->type==="Admin"){
				$this->redirect(array('clientCompany/create','id'=>$model->id));
                             }else {
                                 $this->redirect(array('/users/view','id'=>Yii::app()->user->id));

                             }
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
            $model=$this->loadModel($id);
            
            //Logs
                    $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
                       $logU->description= "A User Has been Remove <b>" .$model->Fullname ."</b>"  ;

			$logU->dateTime= date('Y-m-d H:i:s');
                
                $logU->save();
                
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
