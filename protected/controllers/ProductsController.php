<?php

class ProductsController extends Controller
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
				'actions'=>array('create','update','admin','delete','loadImage'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Admin"))'
			),
                          array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','loadImage'),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Supplier"))'
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','loadImage'),
				/*'user'=>array('admin'),*/
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->type) && 
					((Yii::app()->user->type==="Regular"))'		//------------------------------------
			),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('loadImage'),
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
		$model=new Products;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
			{
			$model->attributes=$_POST['Products'];
	
	                        if(!empty($_FILES['Products']['tmp_name']['p_pic']))
		            {
		                $file = CUploadedFile::getInstance($model,'p_pic');
	                //$model->med_descxray = $file->name;
                                
                                //logs
                            $logC=new Logs;
				$logC->emp_id= Yii::app()->user->id;
				$logC->description= "Created an Users: <a href=/Linckt/index.php?r=products/view&id=". $model->pcode . ">" . $model->pname . "</a> has been added";
                                $logC->description= "<a href=/Linckt/index.php?r=products/view&id=". $model->pcode . ">" . $model->pname . "</a> has been created";
				$logC->dateTime= date('Y-m-d H:i:s');
				$logC->save();
                                
                               //for the picture   
		                $model->fileType = $file->type;
		                $fp = fopen($file->tempName, 'r');
		                $content = fread($fp, filesize($file->tempName));
		                fclose($fp);
		                $model->p_pic = $content;
		            }
                    
			if($model->save())
				$this->redirect(array('products/index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
           Public function actionloadImage($id)
		    {
		        $model=$this->loadModel($id);
	
		        header('Content-Type: ' . $model->fileType);
		        print $model->p_pic;
	
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

		if(isset($_POST['Products']))
		{
                    
                      $logU=new Logs;
			$logU->emp_id= Yii::app()->user->id;
			$logU->description= "Updated an product information: <a href=/Linckt/index.php?r=products/view&id=". $model->pcode . ">" . $model->pname . "</a>";
			$logU->dateTime= date('Y-m-d H:i:s');
                    
			$model->attributes=$_POST['Products'];
                        
                      
	                          if(!empty($_FILES['Products']['tmp_name']['p_pic']))
	            {
		                $file = CUploadedFile::getInstance($model,'p_pic');
	                //$model->med_descxray = $file->name;
		                $model->fileType = $file->type;
		                $fp = fopen($file->tempName, 'r');
		                $content = fread($fp, filesize($file->tempName));
		                fclose($fp);
		                $model->p_pic = $content;
                                
                                
                       
		            }
			
		
                if($model->save()&& $logU->save())
				$this->redirect(array('productunit/create','id'=>$model->pcode));
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
                       $logU->description= "A Product Has been Remove: <b>" .$model->pname ."</b>"  ;

			$logU->dateTime= date('Y-m-d H:i:s');
                
                $logU->save();
                $this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $userid =Yii::app()->user->id;
            
              if(Yii::app()->user->type==="Admin" || Yii::app()->user->type==="Regular" || Yii::app()->user->type==="Client" ) {
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
              } else if(Yii::app()->user->type==="Supplier"){
                  $dataProvider=new CActiveDataProvider('Products' ,  array(
                    'criteria'=>array(
                    'condition'=>'supplier_id='.$userid,
              )));
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
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        
        
	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
